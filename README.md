AI Health

Full source code at: https://colab.research.google.com/drive/1m1YSNaIXvTLO5PeICI-M8-IWLEOeqH2C?usp=drive_link
7.1	AI Health
The AI Health application is a system developed mainly in PHP using a MySQL database among other technologies like Python and Flask.
The web system gives the possibility for physicians to upload medical images and the application will mention if there is Covid-19 or pneumonia on the uploaded file. Several strategies were used concerning the development like the MVC and other features in order to facilitate the clinical work.
The PHP-based application designed for medical imaging analysis is a versatile tool that aids in the detection of Covid-19 in X-rays, Covid-19 in CT scans, and pneumonia in X-rays. 
AI Health features a user-friendly web interface built using HTML, Cascading Style Sheet (CSS), and possibly JavaScript. This interface allows users, typically healthcare professionals, to upload medical images (X-rays and CT scans) for analysis. PHP serves as the backend scripting language, handling server-side operations, processing user requests, and managing the application's logic.
The application utilizes a MySQL database to securely store uploaded medical images and their associated data. This database stores information about the images, predictions made by the deep learning models, and patient records.
Deep learning models (in .h5 format) for detecting Covid-19 and pneumonia are integrated into the PHP application. These models, were developed using Python libraries such as TensorFlow or Keras, that enable the analysis of uploaded medical images.
Upon image upload, the PHP application triggers the deep learning models to make predictions. The results of the analysis, indicating the presence or absence of Covid-19 or pneumonia, are displayed to the user through the web interface.
The application uses APIs to retrieve data from the MySQL database, presenting information such as previous analysis results, patient records, or image details.
The application incorporates error-handling mechanisms to manage exceptions during image uploads or predictions. It provides users with clear feedback on the success or failure of the prediction process.
This PHP-based medical imaging analysis application streamlines the process of image uploads, deep learning-based analysis for disease detection, and result presentation, contributing to efficient and informed decision-making in the medical field. Figure 108 shows some images of the UI of AI Health, mentioning the importance of the web uploader and the possibility of use of the patient file. The application encompassed the utilization of the VGG-16, VGG-19, ResNet-50, AlexNet, and a custom prototype models. It integrated a medical image uploader, facilitated patient file presentation, and conducted comprehensive result analysis.

 ![image](https://github.com/user-attachments/assets/34a59f44-cc82-47b5-acfb-5f784dc45caa)

Figure 110. Functionalities of the AI health application.

Some functional requirements obtained after the user stories are: 
•	The system must provide the accuracies for different models.
•	The system must store the inserted values by the healthcare professional.
•	The system must have a patient file.
•	The system should display the values obtained for different times.
•	The system should show the prediction of the existence of a disease after uploading a medical image.
•	The system should have a login system.
•	The system must integrate all applications in an online program.
User stories are concise, simple descriptions of a feature or requirement from an end-user's perspective. They are typically used in Agile software development as a way to capture requirements and describe the functionality of a system.
User stories served as a mean of communication with physicians to facilitate the development. It helped in prioritizing tasks, focusing on user needs, and maintaining a customer-centric approach throughout the development process. These stories help to track progress during development sprints.
Gathering requirements helps in understanding what the end users or stakeholders truly need. It ensures that the software being developed aligns with their expectations and solves their problems. Clear requirements help define the scope of the project. They outline what features and functionalities the software should have, allowing for better planning, estimation, and resource allocation. Accurate requirements reduce the likelihood of misunderstandings and changes later in the development process. This helps minimize rework, which can be costly and time-consuming. Having well-defined requirements sets clear expectations for both the development team and stakeholders. It provides a shared understanding of what will be delivered and helps manage stakeholders' expectations throughout the project. Gathering and documenting requirements early on can uncover potential risks or challenges. Requirements serve as a guide for the development. They provide a roadmap for building the software, ensuring that the development stays focused on delivering the necessary functionalities.
Clear requirements serve as a benchmark for testing and validation. They help in creating test cases and scenarios, ensuring that the software meets the specified criteria. Requirements documentation acts as a reference point. 
This section intends to achieve #Objective_3, answering #Research_Question_4 and presenting #Hypothesis_6.
7.1.1	Web Image Uploader
AI Health offers a web uploader for medical images this was possible to achieve by using pyton and Flask. The Flask application allows to handle web requests and responses. Set up routes to handle different functionalities like image upload and prediction display.
The developed user interface was intuitive allowing users to upload medical images (CT scans or X-rays).  HTML, JavaScript and CSS was used for the UI design, allowing to implement a form to enable image uploads.
Figure 108 shows the form used in the AI Health application to upload medical images, after upload will present the prediction mentioning if it was detected Covid-19 for X-rays and CT scans or pneumonia for X-rays.

 ![image](https://github.com/user-attachments/assets/ccb4f548-c35b-46df-97bf-d40f68caa38f)

Figure 111. Interface of the web uploader and display of the prediction result.
A route in Flask was implemented to handle image uploads from the user interface. Process the uploaded images and save them in a designated folder or storage location on the server.
The previously developed pre-trained deep learning models (.h5 files) in Python used libraries like TensorFlow or Keras. The models were trained to detect Covid-19 in X-rays and CT scans, as well as pneumonia in X-rays.
The trained models were loaded within the Flask application, allowing to predict the presence of Covid-19 or pneumonia in the uploaded medical images (CT scans and X-rays).
The results are displayed on the web interface. Presenting the outcome of the analysis, indicating the presence or absence of Covid-19 and pneumonia in the uploaded images.
Error handling mechanisms were implemented to handle exceptions during image uploads or predictions. User-friendly feedback messages are provided to inform users about the success or failure of the prediction process.
The Flask-based web application is capable of uploading medical images, applying deep learning models to predict Covid-19 and pneumonia presence, and displaying the results.
 There was a focus on usability, security, and accuracy while developing such applications for medical image analysis.
Figure 109 shows the Python code used to implement the web uploader, where libraries like Tensorflow, Keras and Numpy were imported. The code also shows the process of implementing a model developed in Python.
The development of a web application using Python and Flask aimed at providing a research contribution on the medical diagnostics process by facilitating the upload and analysis of X-ray and CT scan images for detecting COVID-19 and pneumonia marks a significant leap in healthcare technology.
Leveraging Python and the Flask framework, this web app offers a user-friendly interface enabling users, including medical professionals and researchers, to securely upload X-ray and CT scan images. Once uploaded, the app utilizes cutting-edge deep learning algorithms to analyze the images, swiftly identifying potential indications of COVID-19 in CT scans and pneumonia in X-rays.
For CT scans, the app employs advanced image processing techniques tailored for COVID-19 detection. By leveraging machine learning models trained on vast datasets, it accurately identifies characteristic patterns associated with COVID-19 infections, assisting healthcare providers in swift diagnoses.
Similarly, the web app's capabilities extend to X-rays, focusing on detecting pneumonia. Through sophisticated algorithms trained on diverse X-ray datasets, it swiftly identifies telltale signs indicative of pneumonia, aiding in rapid assessment and early treatment decisions.
The development process encompasses the integration of Flask's powerful web development capabilities with Python's robust deep learning libraries, ensuring a seamless user experience. The app provides real-time analysis results, enhancing the efficiency of healthcare professionals and researchers in diagnosing respiratory illnesses promptly.
Moreover, the web application prioritizes data security and privacy, implementing stringent measures to safeguard sensitive medical information uploaded by users. It adheres to industry standards and regulations, guaranteeing confidentiality and integrity throughout the diagnostic process. 

 ![image](https://github.com/user-attachments/assets/a3fe9283-1ff2-4f27-ab75-00eb1180632f)

Figure 112. Python code used for the web image uploader.
The development involved integrating Flask for web handling, developing or using pre-existing deep learning models for medical image analysis, and designing a user-friendly interface to facilitate image uploads and display prediction results. Accuracy, security, and user experience were essential considerations throughout the development process.
In essence, this Python-Flask-based web application represents a research contribution in healthcare technology. By offering a user-friendly platform for uploading and analyzing X-ray and CT scan images, it facilitates expedited detection of COVID-19 and pneumonia. The fusion of deep learning algorithms with a user-centric interface positions this innovation as a valuable tool in the arsenal of medical professionals striving for more effective and timely diagnoses in the realm of respiratory diseases. The development of a web application using Python and Flask marks a pivotal advancement in the realm of medical diagnostics, specifically catering to the rapid and accurate detection of COVID-19 and pneumonia through the analysis of X-ray and CT scan images. This innovative web app harnesses the power of Python's extensive deep learning libraries and Flask's robust framework to create an intuitive and accessible platform. Its primary goal is to streamline the process of uploading medical images, ensuring a user-friendly experience for healthcare professionals, researchers, and even patients seeking information.
The app's functionality is two fold. For CT scans, it employs state-of-the-art image processing techniques honed specifically for detecting COVID-19-related patterns. Leveraging machine learning models trained on extensive datasets of CT scans, the application swiftly identifies unique markers associated with COVID-19 infections. This rapid detection capability is pivotal in aiding healthcare providers with timely diagnoses and treatment planning. Simultaneously, the web app's capabilities extend to the realm of X-rays, targeting the detection of pneumonia. By integrating sophisticated algorithms trained on diverse X-ray datasets, it swiftly recognizes crucial indicators indicative of pneumonia. The application's efficiency in identifying these telltale signs supports swift assessments and early interventions for patients.
Furthermore, the development process emphasizes stringent security measures to safeguard the privacy and confidentiality of sensitive medical data. Adhering to industry standards and regulations, the web app ensures the integrity of uploaded medical images, maintaining the utmost confidentiality throughout the analysis process.

7.1.2	Database

For the AI Health application the DBMS used was MySQL, configured with the PHPMyAdmin and XAMPP. XAMPP is an open-source software package that simplifies the process of setting up a local web server environment. The name XAMPP stands for Cross-Platform, Apache (A), MySQL, PHP  and Perl. It includes a bundle of essential tools and software components required for web development, making it easier for developers to create and test web applications locally on their computers.
The web server used was the Apache that handles HTTP requests, allowing to run and test websites on your local machine. MySQL is a relational database management system that allowed  the creation and management of the database, used alongside with the PHP web application. PHP is a server-side scripting language used for developing dynamic web pages and interacting with databases.
XAMPP provides a user-friendly interface for starting, stopping, and configuring these components, making it an accessible tool for beginners and experienced developers alike. It's widely used by developers to create and test websites or web applications locally before deploying them to a live server. Additionally, its cross-platform compatibility allows it to run on various operating systems such as Windows, macOS, and Linux.
MySQL is an open-source relational database management system (RDBMS) that's renowned for its reliability, flexibility, and ease of use. Developed by MySQL AB, now owned by Oracle Corporation, it's one of the most popular databases used globally for various applications ranging from small-scale websites to large-scale enterprises.
MySQL follows the relational database model, organizing data into tables with rows and columns, enabling efficient storage and retrieval of information.  It's compatible with various operating systems, including Windows, macOS, Linux, and others, making it versatile for different environments. Known for its speed and efficiency, MySQL can handle complex queries and large volumes of data, making it suitable for high-traffic websites and applications. It offers scalability options, allowing users to expand databases and handle increased data loads as applications grow.

MySQL provides robust security features, including access controls, encryption, and authentication mechanisms, ensuring data protection. Its user-friendly interface and straightforward setup make it accessible for developers and administrators, whether for simple applications or complex database systems. With a large and active community, MySQL benefits from regular updates, bug fixes, and an extensive knowledge base, providing ample resources for troubleshooting and development.
MySQL is commonly used in web development, powering content management systems (CMS) like WordPress, e-commerce platforms like Magento, and countless other web applications. Its compatibility with various programming languages, including PHP, Python, and Java, makes it a preferred choice for developers building modern web solutions.
Overall, MySQL's blend of reliability, performance, and versatility makes it a go-to database solution for applications of all sizes, contributing significantly to the infrastructure of the modern internet.
Figure 148. shows part of the SQL script to generate the full database of AI Health. In SQL, the CREATE TABLE statement is used to create a new table within a database. It outlines the structure of the table by defining its columns, data types, constraints, and keys. This statement does not contain any data; it solely defines the table's schema.
On the other hand, the INSERT INTO statement is utilized to add new records (rows) into an existing table. This statement includes the data that is to be inserted into specific columns within the table.
The CREATE TABLE command establishes the blueprint of a new table. It specifies the table's name, the columns it will contain, their data types (like integers, strings, dates), any constraints (such as not allowing null values), and keys (like primary keys that uniquely identify each row).
The INSERT INTO statement is used after a table has been created. It inserts new data into the table. It includes the table's name, specifies which columns the data will be inserted into, and provides the actual values that will be added as a new row or rows.

In essence, CREATE TABLE sets up the structure of the table, while INSERT INTO adds specific data into that table according to the defined structure. Both statements are fundamental in database management, allowing for the creation of tables with defined attributes and the insertion of data into those tables.

 ![image](https://github.com/user-attachments/assets/3f39f482-8a3c-483e-90d8-c216e333acde)

Figure 148. Part of the SQL script to generate the full database of AI Health.

The database was created in MySQL and allowed to store data in order to be possible to develop the application.
For the AI Health, the database has 19 tables, being some connected. Figure 149 shows the tables used and their relations, it provides an overview of the database system, where the information is stored.

![image](https://github.com/user-attachments/assets/e193eae9-f261-4e56-8c92-448a35cae586)
 
Figure 149. Entity relationship model of the AI Care database.

The architecture follows a 3-tier standard allowing to use application programming interfaces, on the presentation layer there are views and controllers, on the logic layer the processes and the controllers to perform the functions and on the data layer the models and entities and the controllers, the connection to the database used the function “mysqli_connect”, which is a PHP function used to establish a connection between a PHP script and a MySQL database using the MySQL Improved Extension (mysqli). This function allows PHP to interact with MySQL databases, enabling various database operations such as querying, inserting, updating, and deleting data.
Once the connection is established, it is possible to execute SQL queries or perform other database operations using mysqli functions like mysqli_query, mysqli_fetch_assoc, mysqli_prepare, among others.

It was essential to handle errors that occured during the connection process using functions like mysqli_connect_error() to catch any connection failures.
Additionally, to prevent SQL injection attacks and enhance security, statements or parameterized queries with mysqli_prepare and mysqli_stmt_bind_param were used. These methods help sanitize user inputs before executing queries.
Foreign keys were used in the database to establish relationships between tables. They define a column or a set of columns in one table that references the primary key or a unique key in another table. These keys maintain referential integrity, ensuring that relationships between tables are valid and consistent.
Foreign keys enforce referential integrity, ensuring that relationships between tables remain consistent. They enable JOIN operations, allowing data to be retrieved from multiple tables using a single query.
Foreign keys can cascade changes from the parent table to the child table. For instance, if a record in the parent table is deleted or updated, the corresponding records in the child table can also be deleted or updated automatically (depending on the defined actions like CASCADE, SET NULL, etc.). They provide a clear understanding of the relationships between tables, making the database structure more understandable for developers and analysts.
Foreign keys helped  designing the database in organizing and structuring data by establishing logical connections between different entities, which is crucial for maintaining a well-structured and efficient database system.
Stored procedures were used, which are sets of SQL statements stored in the database server. They're precompiled, named, and stored in the database catalog for reuse. They allow to execute complex logic on the database server itself, reducing network traffic and enhancing performance by minimizing round trips between the application and the database.
Stored procedures are precompiled and stored in the database, which improves performance by reducing compilation overhead each time they're executed. They promote reusability as they can be called from multiple applications or parts of the same application. This enhances maintainability by centralizing code logic. They offer a layer of security by controlling access to data. Permissions can be set to allow execution of the stored procedure while restricting direct access to underlying tables or views.
 Stored procedures can handle transactions, ensuring data consistency by allowing multiple SQL operations to be treated as a single unit of work. This helps in implementing complex operations that involve multiple queries and updates.
7.1.3	Login
A Login system was developed to distinguish the access from patients and physicians, also security mechanisms were implemented. Figure 150 shows the Login page for the AI health system.

 ![image](https://github.com/user-attachments/assets/916b239e-9175-4060-a133-85dd5258e741)

Figure 150. The Login page.
Securing a PHP application that interacts with a MySQL database involves implementing various measures to protect against common security threats. 
Parameterized queries were used to avoid direct insertion of user inputs into SQL queries to prevent SQL injection attacks. The use of parameterized queries or prepared statements (in example, mysqli prepared statements) hepled to sanitize user inputs before executing SQL queries.
All user inputs are validated to ensure they match the expected format and type. PHP filters, regular expressions, or validation libraries were used to sanitize inputs and prevent malicious data entry.
Functions like htmlspecialchars() were used to escape HTML entities. This prevents cross-site scripting (XSS) attacks by rendering HTML tags inert.

A secure connection to the database server was done by using SSL/TLS encryption to protect data transmitted between the PHP application and the MySQL database.
MySQL users were created with the least privileges required for the application to function. Avoiding the use of the root account for application connections. Only necessary permissions to users were granted, limiting access to specific databases and tables.
Hashing algorithms like SHA-256 were used for storing passwords in the database.
Error handling was implemented to avoid exposing sensitive information in error messages. Log errors were monitored for suspicious activities or potential security breaches.
Secure session handling mechanisms (in example, session_regenerate_id(), setting session cookie attributes) were used and session data was stored securely to prevent session hijacking and fixation.
Figure 151 shows the code to verify if a session exists, in case there is not it will redirect to the login page. 
The mysqli_prepare and mysqli_stmt_bind_param are functions in PHP used for prepared statements with MySQLi, which is an improved version of the MySQL extension in PHP, offering better security and functionality.
The mysqli_prepare is used to create a prepared statement in MySQLi. It prepares an SQL query for execution and returns a statement object that can be used for executing the prepared query multiple times with different parameters. The syntax is mysqli_prepare($connection, $query), where $connection is the connection object returned by mysqli_connect and $query is the SQL statement with placeholders for parameters (e.g., SELECT * FROM table WHERE column = ?).
The mysqli_stmt_bind_param binds variables to a prepared statement as parameters. It assigns variables as parameters to the prepared statement placeholders, allowing safe execution of the prepared statement with user inputs. The syntax is mysqli_stmt_bind_param($statement, $types, $param1, $param2, ...) where $statement is the prepared statement object returned by mysqli_prepare, $types specifies the data types of the parameters, and $param1, $param2, etc., are the variables to bind as parameters.
Prepared statements with bound parameters prevent SQL injection attacks by separating SQL logic from user input. They help ensure that user input is treated as data rather than executable code, making the queries more secure and less susceptible to malicious input.

 
Fi![image](https://github.com/user-attachments/assets/4d721f56-88db-4dd1-a3ae-34414d097544)
gure 151. PHP code to check if user is logged.
Figure 152. shows the continuation of the PHP code used to verify sessions and checks the values username and password and provides the error messages in case an exception occurs.
The mysqli_stmt_fetch() function is used to fetch the results of a prepared statement execution into variables bound to the output columns of the query result. It fetches the next row from the result set and stores the values into variables that were bound to the result columns.
This function is essential when working with prepared statements in PHP, as it allows you to retrieve and work with the result set data obtained from executing the prepared query.

 ![image](https://github.com/user-attachments/assets/0ed3379a-92a2-4006-9028-9682932f5ff7)

Figure 152. PHP code to assure to check the user and if he is correctly connected.
Figure 153 shows the table users of the AI Health database, where we can see that the passwords are hashed not allowing to be visible in case someone has access to the database.
Hashing is a one-way process, making it more secure for storing passwords. Encryption is reversible, meaning it can be decrypted back to the original value, which is not suitable for passwords.
Storing passwords as hashes rather than encrypted values adds a layer of security, as even if the database is compromised, the original passwords cannot be retrieved from the stored hashes.

Secure, randomly generated salts along with hashing functions were used for added protection against dictionary attacks and rainbow table attacks. 

 ![image](https://github.com/user-attachments/assets/87ee557c-efc2-46ab-9b4b-7ce94f189836)

Figure 153. Table users of the AI Health database.
A table in the MySQL database was created to store user information. This table contain fields like id, username, password (where the hashed password will be stored), and other relevant user information.
The username and password are captured by bring entered by the user via a login form in HTML.
The data gas a validation mechanism and sanitize user inputs to prevent SQL injection and other security vulnerabilities.
The entered password is gasged using password_hash() before storing it in the database during registration.
The password_verify() allows to compare the entered password with the stored hashed password.
If the passwords match, user is authenticated and granted access to the application.
An HTML form was created to accept username and password inputs.
If the login is successful, «a session is created for the user to maintain their logged-in state and redirected to the application's dashboard or designated page.

7.1.4	Dashboard
The dashboard has several components to facilitate the use by the physician.
The login authenticates the healthcare professionals to access the dashboard. A patient database is maintained with details like name, medical history, and relevant metadata for uploaded X-rays and CT scans.
Authorized users can upload X-ray and CT scan images securely via a web interface.
Image processing techniques and deep learning algorithms were used to analyze uploaded X-rays and CT scans.
The application showcases the analysis outcomes for each uploaded image, indicating if Covid-19, pneumonia, or neither is detected.
The reports are detailed with insights regarding the analysis for healthcare professionals to review.
A log of analysis results, and changes in patient conditions over time is maintained.
Encryption mechanisms were implemented to safeguard patient data and uploaded images.
The dashboard has a left menu bar that allows access to several functionalities of the application like the possibility to upload X-rays and CT scans or the see patient files with the results of the predictions.
Dashboards in PHP and MySQL are interfaces that display data in a visually appealing and easily understandable format. PHP is a server-side scripting language often used for web development, while MySQL is a popular open-source relational database management system used to store and manage data.
The dashboard with PHP and MySQL fetches data from a MySQL database using PHP, processing it, and then presenting it in a user-friendly manner. 
PHP was used to establish a connection to the MySQL database using appropriate credentials. This connection will allows to retrieve data from tables.
Once the data was fetched from MySQL, it was processed in PHP. It involvedcalculations, data formatting, or organizing the data into arrays or objects for easier manipulation.
HTML, CSS, and PHP were used to design the dashboard interface. Also libraries like Bootstrap or custom CSS for styling were imported. PHP handles data rendering and dynamically generates content based on the fetched data.
The dashboard elements were popukated (such as tables, charts, graphs, or other visual components) with the processed data obtained from MySQL. 
Since the dashboard requires user interaction, filters or dynamic content based on user choices were implemented. PHP scripts were created to handle these interactions and update the displayed data accordingly.
Figure 154 shows HTML and PHP code on the beginning of the code of the dashboard where are called the CSS files to help with the layout of the page.

 ![image](https://github.com/user-attachments/assets/4a7a6e54-a23d-4596-9954-4e94472202ea)

Figure 154. Table users of the AI Health database
Creating the dashboard involved a combination of HTML, CSS, PHP, and JavaScript for the layout. CSS was used to to style the HTML elements and create an appealing layout. CSS allowed to define colors, fonts, sizes, positions, and more. 
By combining HTML for structure, CSS for styling, PHP for dynamic content, and JavaScript for interactivity, a visually appealing dashboard was developed. 
7.1.5	Patients List
In order to facilitate the work of the physicians, a patients list was developed containing details about the patient that is going to be diagnosed for Covid-19 or pneumonia.
 Figure 155 shows the interface for the patient details where the data can be edited via the user interface.

 ![image](https://github.com/user-attachments/assets/e1f6087d-8c34-41ab-9b30-d74e13a24052)

Figure 155. Patients list in AI Health.
In a web application, a patient list serves as a centralized place to manage and view patient information. It's like a digital directory that allows healthcare professionals or administrators to access important details about their patients in an organized manner.
In the web application, the patient list provides a user-friendly interface to display details of all registered patients in the system.
The patient list allows to view essential information such as patient names, contact details, and medical history and to easily search and find specific patients based on their names or other identifying information. It facilitates updates or modifications to patient records, including adding new patients or editing existing information.
The patient list presents information in a clear and structured layout

Each patient's details are displayed in a tabular or list format, offering a snapshot of their essential information. Users may have options to filter or sort the list based on different criteria, like alphabetical order.
Interactive elements such as buttons or links were included for actions like editing or deleting patient records.
The list is accessible across various devices and screen sizes. It ensures responsiveness, allowing healthcare professionals to access patient information seamlessly from desktops, tablets, or mobile devices.
The user interface was designed to be intuitive and easy to navigate, ensuring that healthcare personnel can quickly find the information they need.
The patient list in a web application provides several key functionalities like enabling users to search for specific patients by entering their names or other identifying details, allowing users to view comprehensive details about individual patients by selecting them from the list, permitting authorized users to update patient details or add new patients into the system.
The patient list serves as a pivotal tool for physicians s and administrators. It streamlines patient management, making it easier to track and maintain accurate patient records. Helps in providing better care by ensuring quick access to vital patient information when needed. Supports administrative tasks like scheduling appointments, managing treatment plans, and coordinating care among healthcare providers.
The patient list in a web application acts as a central hub for managing patient-related information. It simplifies the process of accessing, updating, and organizing patient records, ultimately contributing to better patient care and efficient healthcare administration.
The patient list can be exported to excel as shown on Figure 156 where we can see details like email, name and date of birth among others.

![image](https://github.com/user-attachments/assets/2070273a-2693-4cd4-bea4-c6bacc8ff87c)

 
Figure 156. Excel export of the patients list.
Figure 157 shows the code used when pressing the update button. The mysqli_fetch_array is a PHP function used to fetch a result row from a query executed with the MySQLi extension. This function retrieves a single row of data from the result set obtained from a MySQL database query and advances the result pointer to the next row. It returns the row as an associative array, a numeric array, or both, based on the optional parameter provided. The mysqli_fetch_array fetches each row from the query result as an associative array (MYSQLI_ASSOC), allowing access to the columns by their names. The while loop iterates through each row of the result set until there are no more rows left. The move_uploaded_file is a PHP function used to move an uploaded file to a new location on the server. It's commonly used in web applications to handle file uploads from HTML forms. This function was used for validating uploaded files and moving them to a permanent location on the server with additional checks for file type, size, and security considerations to prevent potential threats like file injections or overwriting sensitive files.


 ![image](https://github.com/user-attachments/assets/8b952527-cdb0-48cd-86e2-05ee3f6a0cfc)

Figure 157. PHP code to update a patient record.
Figure 158 displays a for to edit the details of a patient in AI Health. The web form that allows to edit patient details involved building an interface that allowed authorized users to modify specific patient information. 
An HTML form was created that displays patient details fetched from the database. It includes input fields for each editable detail (name, email, date of birth among others).
HTML and CSS was used to structure the form layout, making it user-friendly and visually appealing.
The form is responsive, allowing users to access and edit patient details on various devices.
PHP was used to retrieve the selected patient's information from the database based on their unique ID.
Upon form submission, the edited data is retrieved and updated the corresponding patient record in the database using SQL UPDATE queries.
When a user selects a patient to edit, the form is populated with the patient's current details fetched from the database.
Users can modify the displayed information within the form fields. Upon submitting the form, the updated data is sent to the server.
The server-side code handles the submitted form data, updates the patient record in the database, and confirms the successful update.
After processing, it displays a message confirming the successful update or indicate if any errors occurred.
Measures were implemented to prevent SQL injection attacks by sanitizing inputs and using prepared statements in database queries.
The form inputs are validated to ensure data integrity and correctness before updating the records.
Only authorized users can access and modify patient details.
Error messages are displayed if any issues occur during form submission or database updates.
The web form to edit patient details involved building an interface that allows users to modify specific patient information securely and efficiently. The frontend provides a user-friendly editing experience, while the backend handles data processing and updates in the database. Incorporating security measures and proper validation ensures the integrity and confidentiality of patient data.
 
 ![image](https://github.com/user-attachments/assets/d8284218-7968-4665-b635-49942d6371c0)

![image](https://github.com/user-attachments/assets/3b0de591-98fd-40d0-8fa2-15da67c2e7b3)

Figure 158. Form to update patient data.

Figure 159 shows the form to insert a new patient, where several details are requested. insert forms in PHP and MySQL allow users to submit data through a web interface, which is then stored in a MySQL database. 

![image](https://github.com/user-attachments/assets/165402aa-85e9-466c-9a83-2a243f715d83)

 
Figure 159. Form to insert patient data.
To create the insert form in PHP and MySQL it involved designing a user-friendly form on the frontend and handling data processing and database insertion on the backend. Ensuring data security, validation, and proper database connectivity were crucial aspects considered when implementing the insert form.









7.1.6	Display of the Results
In order for the physician to be able to confirm the certainty of the prediction, the application allows to show the values of different predictions.
The GUI was developed to facilitate the analysis of the physician.
Figure 160 displays the predictions obtained for a certain patient displaying the model used, the precision, recall, AUC, F1-score and accuracy of the prediction. This process facilitates the analysis of the physician where he can check the accuracy values of different models in order to determine the existence of a pathology for a certain patient.
These values can be edited and show how the models performed in the process of detection.
Displaying deep learning performance metrics for a patient merges data science, deep learning models, and web development. It aims to provide a user-friendly platform where medical professionals can assess the accuracy and effectiveness of these models in interpreting patient data, aiding in clinical decision-making and treatment planning. The application should prioritize data security, usability, and continual improvement to effectively serve its intended users.

 ![image](https://github.com/user-attachments/assets/85170383-803d-4443-a469-749058862b09)

Figure 160. The results of the predictions obtained for a certain patient.


Figure 161 shows an interface that allows to select a patient and insert or edit the predictions for that patient.

 ![image](https://github.com/user-attachments/assets/17c23aa7-2728-460a-acf8-5ecd43fc405b)

Figure 161. Form to enter results of the predictions.
In order for the physician to be able to confirm the certainty of the prediction, the application allows to show the performance metrics of different models.



7.1.7	Usability
Upon logging in, physicians are greeted with a dashboard (see Figure 162). They can search or select a patient from a list to view or update their deep learning performance metrics.
Once a patient is selected, the interface displays their basic details (name, ID, age, etc.) alongside an area for deep learning metrics.
Users can input or update the deep learning metrics associated with the patient.
Fields include accuracy percentages, model evaluations (precision, recall), or any relevant performance metrics obtained from deep learning analyses.
To aid interpretation, the interface include visual representations like charts or graphs showing the trend of performance metrics over time and compared with benchmarks.
The interface ensures that entered data is in an acceptable format and range to maintain accuracy and consistency. After entering or updating the metrics, users can save the changes. The interface provides confirmation messages indicating successful data entry or any errors encountered during the process. The interface is designed to be accessible across different devices (desktops, tablets, mobile phones) and is responsive to various screen sizes.

![image](https://github.com/user-attachments/assets/d51d0d1e-1844-49c0-ac86-d8b02e1973b4)

 
Figure 162. The dashboard for the Physician
Users log into the web application using their credentials to access the dashboard. They can navigate to the patient list or search for a specific patient by name or identifier.
After selecting a patient, the interface displays their details along with the section to input/update deep learning metrics. Users input the relevant performance metrics obtained from deep learning analyses into the designated fields.
Upon completion, users save the entered data. The interface confirms successful submission or prompts for corrections if any issues arise. Streamlines the process of recording and updating deep learning performance metrics for patients.
Visual representations aid in understanding trends and improvements in model performance over time, making it easier for users to interpret data. It ensures consistency and accuracy of performance metrics, promoting better decision-making in patient care based on reliable data. The interface simplifies the task of inputting and managing deep learning performance metrics for patients. It's designed to be user-friendly, ensuring an intuitive experience for healthcare professionals without the need for technical knowledge, enabling efficient and accurate record-keeping of patient-related deep learning insights.
Figure 163 displays the HTML code to display data to the doctors about their patients. It links to other pages for certain functionalities. In order to display data to facilitate the work of the physician displaying values of the analysis.

![image](https://github.com/user-attachments/assets/c1434be3-a909-4c20-81b2-79049f465046)
 
Figure 163. Part of the HTML code to display all data of a certain patient.
Figure 164 displays the web uploader inside AI Health which is a tool to aid the physician where he can upload an X-ray or a CT scan. The system will determine the existence or not of Covid-19 for X-rays and CT scans and if selected the option will detect also pneumonia on X-rays.

![image](https://github.com/user-attachments/assets/68ee2d46-d992-4e99-88bd-7962a4421cec)

 
Figure 229. Display of the web uploader of AI Health to detect pulmonary diseases.
The web uploader presents a clean and intuitive interface. Users can easily upload X-ray or CT scan images by using a simple upload button. The physicians have the option to input basic patient information like name, email, and any relevant symptoms or medical history. Users receive clear indications of upload progress and confirmation once the images are successfully uploaded. The uploaded X-ray or CT scan images are automatically processed and analyzed by a sophisticated AI-based system. The system identifies and highlights potential areas of interest associated with Covid-19 indicators or pneumonia within the images. The system presents the analysis results in a user-friendly format, providing easy-to-understand indicators of potential Covid-19 presence or signs of pneumonia. Results include a simple notification of the prediction obtained. The uploader is designed to be accessible and straightforward, allowing users with minimal technical knowledge to upload and receive analysis results effortlessly. Users experience quick analysis turnaround times, enabling prompt evaluation of X-rays or CT scans to aid in diagnosis.
The system helps in early detection or identification of potential COVID-19 symptoms or signs of pneumonia, contributing to timely medical interventions. Provides valuable information to healthcare professionals, assisting them in making informed decisions regarding patient care based on the analysis results. The user-friendly web uploader simplifies the process of analyzing X-ray and CT scan images for indicators of COVID-19 or pneumonia. It empowers users, especially healthcare professionals, with a quick and accessible tool to aid in the evaluation of medical imaging data, potentially contributing to early detection and timely interventions for patients.
