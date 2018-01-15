#!/bin/bash
info() {
  echo "\033[1;33m[Info]    $1  \033[0m"
}

error() {
  echo "\033[1;31m[Error]   $1  \033[0m"
}

success() {
  echo "\033[1;32m[Success] $1 \033[0m"
}


set -x
info "Print composer info"

success "Composer version: "
composer -V
success "Composer about: "
composer about
success "Composer Shows information about packages: "
composer show
success "Shows a list of locally modified packages: "
composer status
success "Validates a composer.json and composer.lock: "
composer -vvv validate
#"cd /usr/share; ln -s php/data ."
success "***************************** Composer validation finished *****************************"
set +x

success "ls"
ls -l

success ""
#"sudo apt-get install php7.0-xml"
composer  -vvv update