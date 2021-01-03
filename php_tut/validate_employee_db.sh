#!/bin/bash
# This script makes sure that an error didn't get copied into the backup file.
set -ex
if [[ $(wc -l '[tmp backup]' | cut -d' ' -f1) -gt 5 ]]
then
  mv '[tmp backup]' '[final backup]'
fi
set +ex
