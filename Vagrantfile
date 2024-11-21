## Toute commande doit-ere exécution dans le répertoire contenant le Dockerfile
# vagrant up
# vagrant halt
# vagrant destroy
# vagrant global-config
#----------------------
# vagrant ssh [NAME|ID]
Vagrant.configure(2) do |config|

  # int = "nom de l'interface réseau connectée au routeur (ip a || ipconfig /all)"
  # ip = "adresse ip disponible sur le sous réseau local (ping pour tester)"
  # cidr = "24 (si masque réseau en 255.255.255.0)"

  [
    ["gitlab.myusine.fr", "6144", "2", "mlamamra/myusine"],
  ].each do |vmname,mem,cpu,os|
    config.vm.define "#{vmname}" do |machine|

      machine.vm.provider "virtualbox" do |v|
        v.memory = "#{mem}"
        v.cpus = "#{cpu}"
        v.name = "#{vmname}"
        v.customize ["modifyvm", :id, "--ioapic", "on"]
        v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
      end
      machine.vm.box = "#{os}"
      machine.vm.hostname = "#{vmname}"
      machine.vm.network "public_network"
      # machine.vm.network "public_network",bridge: "#{int}",
      #   ip: "#{ip}",
      #   netmask: "#{cidr}"
	    machine.ssh.insert_key = false
    end
  end
end
