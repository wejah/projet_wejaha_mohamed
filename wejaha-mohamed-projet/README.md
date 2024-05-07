# Equipe
wejaha lab
mohamed lab

# Objectif

Ce projet a pour but d'automatiser la création de deux environnements distincts (production et staging) en utilisant des playbooks Ansible et l'ensemble de ses fonctionnalités.

# Structure

Ansible-Project
|
|___files
|   |___nginx
|   |   |___nginx.conf                 
|   |___php_app  
|       |___index.php      
|
|
|   
|___group_vars
|   |___all.yml
|   |___dbservers.yml
|   |___production.yml
|   |___webservers.yml
|   |___staging.yml
|
|___host_vars
|   |___prod-web-server.yml
|   |___stag-web-server.yml
|
|
|
|
|___inventories
|   |___hosts.yml
|
|___roles
|   |___mysql
|   |    |___defaults    
|   |    |   |___main.yml           
|   |    |___tasks
|   |        |___main.yml               
|   |___nginx
|   |    |___defaults    
|   |    |   |___main.yml           
|   |    |___tasks
|   |        |___main.yml
|   |___php
|        |___defaults    
|        |   |___main.yml           
|        |____tasks
|        |    |___main.yml
|        |____templates
|             |___app.ini.j2   
|
|___common.yml
|
|
|___dbservers.yml
|
|
|___handler.yml
|
|
|___main.yml
|
|
|___webservers.yml

- **`playbooks/`** : Contient tous les playbooks Ansible.
- **`roles/`** : Contient les rôles Ansible utilisés pour configurer les serveurs.
- **`group_vars/`** : Variables pour les groupes d'hôtes.
- **`host_vars/`** : Variables spécifiques à chaque hôte.


#  pour lancer playbooks

ansible-playbook webservers.yml dbservers.yml main.yml 

# Notes
Assurez-vous d'avoir configuré les clés SSH et que votre utilisateur Ansible ait les droits sudo appropriés sur les serveurs distants.