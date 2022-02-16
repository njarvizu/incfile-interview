<

## Incfile Interview Exercise
##Installation
# Step 1: Clone repository
Clone with your credentials in your local enviroment.

cd into your projects folder, then:
    git clone https://github.com/njarvizu/incfile-interview.git
 
#### 1.1: File permissions
For Mac or Linux users, you might need to change permissions to the project folder.

    sudo chmod -R 775 incfile-interview

#### 1.2: Update composer
Inside the project folder execute:
    composer install
    
## Step 2: Create/copy configuration files
  Configuration files are ignored by default in the .gitignore file, copy and rename:
  - .env
  
  and PUT this lines at the end of file
  INCFILEPOST_CONNECTION=https://atomic.incfile.com/fakepost
  FAILED_MAIL_INCFILE_FROM=personal@gmail.com
  
  MODIFY QUEUE_CONNECTION as Follow:
  QUEUE_CONNECTION=database


### Step 3: Configure database.
Create a database with the name you prefer  "database_name"
Read and edit '.env' and setup the 'Datasources' and any other configuration relevant for your application.


      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=database_name
      DB_USERNAME=root
      DB_PASSWORD=''
      
### Step 4: Configure MAIL TRAP IN .ENV

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=<YOUR USERNAME>
MAIL_PASSWORD=<YOUR PASSWORD>
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"


Then run the next command:

    php artisan migrate 

### Step 5: Run Laravel command created in this project

  php artisan incfile:fakerpost
  
 ### Step 6: Run the queue work
  php artisan queue:work
            
**** COMMENTS ****
I used a Jobs and queue to do this exercise, the connection used was "database" and "default" queue 

POINT 4:
I created a Job that execute a POST to url defined in the .env (INCFILEPOST_CONNECTION) then 
entering in default queue, to save the task in table jobs. After with the command: "php artisan queue:work"
execute each job saved.

--- this Job tries until three times to do the request

POINT 5:
    If the request failed then  JobFailed Event fired ant put this jobs in failed jobs table.
    Also send and email with the explain about the error
 
 Is necesary verify the failed  and execute the again with command 
 php artisan queue:retry --all
 
 
 






