## Dockerized - PHP & MySQLdb application test attempt, fully deployed using Ansible with some key flexibilities


### What it does ?
- PHP webpage reads from MySQL database to display data. Both services running on two separate containers.


### Prerequisite:
* Python, MySQL and Docker installed on main host
  ```
  sudo yum -y install docker mysql python
  ```
* Ansible modules for Docker, will be required for this: docker_volume, docker_image, docker_container
  ``` 
  pip install docker-py
  ```
  

### Features:  
* Persistent database updates using Docker volumes
* Flexible container build/runs with Ansible tags
* Quick testing using Ansible playbooks to setup independent containers
* Adding containers to default Docker bridge network
* playbook run will idle for 120 seconds after MySQLdb container run


### Running and testing:
* Using a bank.sql sample database for test
* Run playbook
  ```
  ansible-playbook playbook.yml
  ```
* In the event of any tests/modifications to components, re-run specific containers using Ansible tags
  ```
  ansible-playbook playbook.yml --tags=(create_myapp_container or create_db_container)
  ```
* Connect to database from host machine
  ```
  mysql -P 3307 -h 127.0.0.1 -u joseph -p
  ```
- Access index page from host machine using:
  ``` 
  http://localhost:8080
  ```

  
### Other notes:
* Can use Ansible vault to replace prompting for MySQLdb password
* Attempted to use multiple options - Dockerfile, direct container run, Docker volumes
* Re-running playbooks with tags will ask for MySQLdb password
* index.php page has MySQL password provided
* To rebuild myapp_container, stop & remove container, remove image and then 
  ```
  ansible-playbook playbook.yml --tags=create_myapp_container
  ```
