## Toute commande doit-ere exécution dans le répertoire contenant le Vagrantfile
## UP / DOWN
# vagrant up : lance TOUT
# vagrant up <hostname>: lance hostname
# vagrant halt [<hostname>]: arête tout ou seulement hostname
# vagrant destroy [-f] [<hostname>] : détruit [-f sans confirmation] //
# vagrant reload [<hostname>]: halt && up
## CNX
# vagrant ssh [<hostname>]: connexion SSH sur le compte "vagrant" 
#                           via l'interface NAT (127.0.0.1 + redirection 2222 <=> 22)
# vagrant ssh-config: configuration du vagrant ssh
# vagrant global-config
# vagrant plugin (un)install <plg>
##------------------------------------------------------------------
Vagrant.configure(2) do |config|

  int = "Intel(R) Ethernet Connection (7) I219-LM #2"
  # ip = "adresse ip disponible sur le sous réseau local pour la vm (ping | nslookup pour tester)"
  # cidr = "24 (si masque réseau en 255.255.255.0)"

  
  subject = "gitlab"
  image = "ml-registry/#{subject}"

  [
    ["#{subject}.lan.fr", "8192", "4"],
  ].each do |hostname,mem,cpus|
    config.vm.define "#{hostname}" do |machine|

      machine.vm.provider "virtualbox" do |v|
        v.memory = "#{mem}"
        v.cpus = "#{cpus}"
        v.name = "#{hostname}"
        v.customize ["modifyvm", :id, "--ioapic", "on"]
        v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        ## pour travailler en NAT
        # v.customize ["modifyvm", :id, "--natpf1", "https,tcp,127.0.0.1,8443,,443"]
        # v.customize ["modifyvm", :id, "--natpf1", "http,tcp,127.0.0.1,8025,,8025"]
        # v.customize ["modifyvm", :id, "--natpf1", "sonar,tcp,127.0.0.1,9000,,9000"]
      end
      machine.vm.box = "#{image}"
      machine.vm.hostname = "#{hostname}"
      ## pour travailler en bridge public et DHCP
      machine.vm.network "public_network", bridge: "#{int}"
      ## pour travailler en bridge public + IP fixe
      # machine.vm.network "public_network", bridge: "#{int}",
      #   ip: "#{ip}",
      #   netmask: "#{cidr}"
	    machine.ssh.insert_key = false
    end
  end
end


