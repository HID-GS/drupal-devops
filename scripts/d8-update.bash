#!/usr/bin/env bash

function usage() {
  echo "This script updates a Drupal 8 module via composer."
  echo "If 'core' is used as a parameter, the script will attempt to update Drupal core."
  echo ""
  echo "Usage: $0 <module name|core>"
  echo ""
  exit 1
}

function error() {
   echo "ERROR: $@"
   echo ""
   usage
}

function logText() {
  if [ $# -gt 0 ]; then
    day=$(date "+%Y-%m-%d-%H-%M-%S")
    echo "$day - $@"
  fi
}

if [ $# -ne 1 ]; then 
  error "Wrong number of parameters."
fi

if [ $(git rev-parse --show-toplevel &> /dev/null; echo $?) -ne 0 ]; then
  error "this is not a git repository. Switch to inside a git repo and retry."
fi

MODULE="$1"
MOD_UPD="${MODULE}"
if [ $(echo ${MODULE} | grep '/' &> /dev/null | wc -l) -ne 0 ]; then
  MOD_UPD="drupal/${MODULE}"
fi

logText "Checking for available packages"
PACKAGES="$(composer show -loNDm 2> /dev/null)"
if [ $(echo ${PACKAGES} | grep ${MOD_UPD} 2> /dev/null | wc -l) -le 0 ]; then
  logText "${MOD_UPD} not found."
  logText "Available packages:"
  echo "${PACKAGES}"
  echo ""
  error "Package doesn't have a minor update available. Please check the package name."

fi

MOD_MSG="$(if [ "${MODULE}" == "core" ]; then echo -ne "Drupal "; fi)${MODULE}"
logText "Starting update process"
logText "Looking to update ${MOD_UPD}"
composer update ${MOD_UPD} --with-dependencies && \
  git add -u && \
  git ci -m "secreview: Update ${MOD_MSG} to $(composer show ${MOD_UPD} | sed -ne 's/^version.* //gp')" && \
  git push
logText "Update process done"
