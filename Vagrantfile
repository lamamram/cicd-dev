## Toute commande doit-ere exécution dans le répertoire contenant le Dockerfile
# vagrant up
# vagrant halt
# vagrant destroy
# vagrant global-config
#----------------------
# vagrant ssh [NAME|ID]
Vagrant.configure(2) do |config|

  int = "nom de l'interface réseau connectée au routeur (ip a || ipconfig /all)"
  # ip = "adresse ip disponible sur le sous réseau local (ping pour tester)"
  # cidr = "24 (si masque réseau en 255.255.255.0)"
  
  subject = "jenkins"
  image = "ml-registry/#{subject}"

  [
    ["#{subject}.lan", "6144", "4"],
  ].each do |hostname,mem,cpus|
    config.vm.define "#{hostname}" do |machine|

      machine.vm.provider "virtualbox" do |v|
        v.memory = "#{mem}"
        v.cpus = "#{cpus}"
        v.name = "#{hostname}"
        v.customize ["modifyvm", :id, "--ioapic", "on"]
        v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        ## pour travailler en NAT
        # v.customize ["modifyvm", :id, "--natpf1", "https,tcp,127.0.0.1,8443,,8443"]
        # v.customize ["modifyvm", :id, "--natpf1", "http,tcp,127.0.0.1,8025,,8025"]
        # v.customize ["modifyvm", :id, "--natpf1", "sonar,tcp,127.0.0.1,9000,,9000"]
      end
      machine.vm.box = "#{image}"
      machine.vm.hostname = "#{hostname}"
      machine.vm.network "public_network", bridge: "#{int}"
      # machine.vm.network "public_network", bridge: "#{int}",
      #   ip: "#{ip}",
      #   netmask: "#{cidr}"
      machine.ssh.insert_key = false
    end
  end
end
