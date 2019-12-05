#!/usr/bin/env bash

function usage() {
  echo "This script updates a Drupal 8 module via composer."
  echo ""
  echo "Usage:"
  echo "$0 <module name|core>"
  echo "If 'core' is used as a parameter, the script will attempt to update Drupal core."
  exit 1
}

function error() {
   echo "ERROR: $@"
   echo ""
   usage
}

if [ $# -ne 1 ]; then 
  error "Wrong number of parameters."
fi

if [ $(git rev-parse --show-toplevel &> /dev/null; echo $?) -ne 0 ]; then
  error "this is not a git repository. Switch to inside a git repo and retry."
fi

