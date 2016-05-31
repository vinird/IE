# IE on Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)


## COMANDOS PARA LA UTILIZACIÓN DE GIT


### Iniciar Git en un proyecto
**``git init``**

### Agregar archivos al estado "stage"
**``git add nombreDelAchivo``**

**``git add '*.extensiónDelArchivo'``**

**``git add -A``**		// agrega todos los archivos al "stage"

### Hacer un commit
**``git commit -m "mensaje del commit"``**

**``git commit -a -m "mensaje del commit"``**	// agrega archivos al "stage" area y realiza el commit

**``git commit --amend``**			// modifica el nombre del último commit 

### Comprobar el estado de los archivos 
**``git status``**

**``git status -s``**		// muestra una descripción corta del mensaje


### Ver las modificaciones en cada commit
**``git diff``**

**``git diff --staged``**

**``git diff rama1 rama2``**


### Remover archivos del repositorio 
**``git rm nombreDelArchivo``**

### Ver los commit que se han realizado 
**``git log``**

**``git log --pretty=format:"%h - %an, %ar : %s"``**	// da formato en linea al mensaje

**``git log --pretty=oneline``**			// da formato en linea corto al mensaje

**``git log --pretty=format:"%h %s" --graph``**		// da formato al mesaje en forma de gráfica


### Quitar archivos 
**``git reset nombreDelArchivo``**		// git deja de rastrear los cambios en el archivo

**``git checkout -- nombreDelArchivo``**	// se restaura las modificaciones hechas en el ultimo commit

**``git rm nombreDelArchivo``**			// remueve los archibos del proyecto


### Administrar ramas "branch"
**``git branch``**			// ver ramas

**``git branch nombreDeLaRama``**	// crea una nueva rama

**``git checkout nombreDeLaRama``**	// selecciona una rama para trabajar

**``git merge nombreDeLaRama``**	// agrega los cambios de otra rama

**``git branch -d nombreDeLaRama``**	// elimina la rama

### Administrar un repositorio remoto
**``git clone url``**			// copia los archivos del repositorio a un directorio local

**``git remote add origin url``**	// sincroniza el repositorio remoto

**``git remote remove origin``**	// desvincula el repositorio remoto

**``git remote -v``** 			// muestra el estado de origin

**``git pull origin HEAD``**		// descarga el contenido del repositorio remoto

**``git push origin master``**		// subir el contenido al repositorio remoto


## Levantar el proyecto con Homestead y Vagrant
1. Descargar e instalar ya sea [VirtualBox](https://www.virtualbox.org/wiki/Downloads) o VMware para la virtualización.
2. Descargar e instalar [Vagrant](http://www.vagrantup.com/downloads.html).
3. Añadir el plug-in Vagrant Box mediante el comando **``vagrant box add laravel/homestead``**.
4. Durante la instalación seleccionar el software de virtualización escogido en el paso 1.
5. Crear una carpeta llamada "Homestead" en /home/Usuario..
6. Ejecutar los comandos **``cd ~``** (Para situarse en la carpeta home del usuario) y **``git clone https://github.com/laravel/homestead.git Homestead``** (Clonar el proyecto de Lavarel Homestead).
7. Situarse en la carpeta Homestead.
8. Ingresar el siguiente comando **``bash init.sh``** para iniciarlizar Homestead.
9. Crear una clave ssh con los siguientes comandos **``mkdir ~/.ssh``** (crear la carpeta donde se almacenará la clave), 
**``chmod 700 ~/.ssh``** (limita el acceso a la carpeta) y **``ssh-keygen -t rsa`** (generador de la clave).
10. Crear una carpeta en el home del usuario con el nombre "Sites" ya que en esta se guardará el sitio web.
11. Ahora para configurar el sitio hay que abrir el archivo Homestead.yaml, ubicado en .homestead como una carpeta oculta dentro del home del usuario.
12. Modificar la dirección ip de la maquina virtual en el apartado ip por una más coveniente, por ejemplo "192.168.2.2".
13. Modificar en el apartado sites el map por la ruta web que se desea para ingresar al sitio, por ejemplo "infoempresarial.com".
14. Añadir al archivo hosts, ubicado en /etc la dirección modificado en el paso 12 y el nombre de dominio modificado en el paso 13 (puede requerir acceso como superusuario), por ejemplo "192.168.2.2 infoempresarial.com".
15. Para finalizar, levante la máquina virtual con el comado **``vagrant up``**.


Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
