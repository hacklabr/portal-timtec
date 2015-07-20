# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.network "forwarded_port", guest: 80, host: 8000
  config.vm.network :private_network, ip: "192.168.78.50"

  # If true, then any SSH connections made will enable agent forwarding.
  # Default value: false
  # config.ssh.forward_agent = true

  config.vm.synced_folder "./", "/var/www/wordpress/", create: true
  config.vm.provider "virtualbox" do |vb|
  #   # Don't boot with headless mode
  #   vb.gui = true
     vb.customize ["modifyvm", :id, "--memory", "1024"]
  end

  config.vm.provision "shell", path: "bootstrap.sh"

  #config.vm.provision "ansible" do |ansible|
  #  ansible.verbose = "v"
  #  ansible.inventory_path = "vagrant-inventory"
  #  ansible.host_key_checking = "false"
  #  ansible.limit = "all"
  #  ansible.playbook = "ansible.yml"
  #end

end
