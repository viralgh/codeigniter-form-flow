# codeigniter-form-flow
- The purpose of this repository is to showcase the modified MVC pattern that was implemented in the version 3.x of Codeigniter php framework
- This code have all the ingridients to run a Codeigniter 3 application to showcase the coding pattern introduced here
- Follow the below instructions to setup the application

## setting up
- Download Codeigniter 3.x in your apache directory
- Modify the databse config file `database.php` and create a database for the application
- Put the contoller `Jobs.php`, model `Jobs_model.php` and helper `helper.php` in codeingiter's controller, model and helper directory respectively
- Create two html files for handling the form
  - `jobs.php` for listing the jobs in database
  - `jobs_edit.php` for adding/editing the entry in databse
  - (optional) create header `main_header.php` and footer `main_footer.php`, you can comment this in `Jobs.php` controller also

## benefits
- Overrides the basic codeingiter 3.x basic form handling
- Basic operation become much less time consuming
- Easy to debug the code once developer gets grip of this
- Code structure becomes readable and easy to adapt for new developer
- No need to write custom logic for every basic (CRUD) operation

## reporting
- Please report [issues or improvements](https://github.com/viralgh/codeigniter-form-flow/issues) here
- Same code pattern can be introduced for any language, to request please report in above mentioned link

# Code review Question link
https://codereview.stackexchange.com/questions/104202/codeigniter-form-flow-for-model-and-controller
(Asked 09-Sep 2015) (Answers: 0)
