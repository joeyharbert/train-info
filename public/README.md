# Train Info

Train info is an application for reading csv files containing Chicago train line information.

## Installation

1. Make sure you have Apache, PHP, and MySQL installed; I'm using MAMP and PHP version 7.4.33.

2. Clone down the application into your document root.

3. I've included a DB set up file that you can run to get your DB looking the way Train Info expects, you can run it by navigating to the root of the project and running the below command (assuming you know your root user login, if not, substitute root for your mysql username.

```bash
mysql -u root -p < ./private/db_setup.sql
```

- The setup sql will create a database called `train_info` as well as a user named `trainuser`. If you have any naming conflicts, please feel free to edit the file before you run it.

4. Start the server

For reference, my MAMP is running Apache on port 80 and MySQL on 3306.

## Usage

Navigate to `localhost:[apache-port]/train-info/public/index.php` to get started! \* Note: if your Apache server is running on port 80, you may not need to include a port.

Train info expects a CSV in the following format:

- The first row is a header row
- The columns are "Train Line, Route, Run Number, Operator ID" in that order
  - In the future, I would like to update this to be a little more dynamic, but as it stands, I do expect static data.

## Notes

- I was concerned about the prospect of a user uploading multiple files, so originally I went with two tables (files and trains), but ran into issues with making sure I was only showing unique data. Could possibly sanitize data on the way in, but ended up pivoting so now Train Info wipes the data each time a file is uploaded
- As of right now, I am making an insert for each row of the CSV, may be more efficient to make less calls to the DB and do one big insert, but this was the most straightforward way for me to solve initially.
