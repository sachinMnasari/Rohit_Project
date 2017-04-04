Create Database Rohit_Tutorials;
use Rohit_Tutorials;
CREATE TABLE Student
(
S_ID int NOT NULL ,
S_password varchar(500) not null,
S_DOB Date NOT NULL,
S_F_name varchar(30) not null,
S_L_name varchar(30) not null,
S_Gender varchar(1),
S_Standart Varchar(25),
S_School_name Varchar(50),
S_Extra Varchar(300),
S_Percent Varchar(7),
S_std_app Varchar(25),
S_fees int not null,
S_fees_remaining int not null,
S_Address varchar(255) not null,
S_adhar Varchar(25),
Dm_lastupdt DATETIME not null,
PRIMARY KEY (S_ID)
);
Create table student_contact
(
S_ID int not null,
S_contact BIGINT  not null,
Dm_lastupdt DATETIME not null,
PRIMARY KEY (S_ID,S_contact),
FOREIGN KEY (S_ID) REFERENCES Student(S_ID)
);
Create table Student_reference
(
S_ID int not null,
S_Reference varchar(25) not null,
Dm_lastupdt DATETIME not null,
PRIMARY KEY (S_ID,S_Reference),
FOREIGN KEY (S_ID) REFERENCES Student(S_ID)
);
Create Table Teacher
(
T_ID int not null ,
T_password varchar(500) not null,
T_F_name varchar(25) not null,
T_L_name Varchar(25) not null,
T_DOB Date not null,
T_Gender varchar(1),
T_experience int,
T_address varchar(255),
T_Aadhar varchar(25),
T_Physically_Fit varchar(1),
T_location_to Varchar (50),
T_location_from Varchar (50),
T_resume_name varchar(30),
Dm_lastupdt DATETIME not null,
PRIMARY Key (T_ID)
);
Create table teacher_contact
(
T_ID int not null,
T_contact BIGINT  not null,
Dm_lastupdt DATETIME not null,
PRIMARY key (T_ID,T_contact),
FOREIGN KEY (T_ID) references Teacher(T_ID)
);
Create Table teacher_reference
(
T_ID int not null,
T_reference varchar(25),
Dm_lastupdt DATETIME not null,
Primary key (T_ID,T_reference),
foreign key (T_id) references Teacher(T_id)
);
Create table subject
(
pk int not null,
Field_Id int not null,
field_nm varchar(30) not null,
Subject_Id int not null,
subject_name varchar(30) not null,
subject_period int not null,
class_id int not null,
class_name varchar(30) not null,
Board_id int not null,
Board_name varchar(30) not null,
Dm_lastupdt DATETIME not null,
PRIMARY Key (pk,Field_Id,Subject_Id,class_id,Board_id)
);
Create table timing_prefer 
(
timing_ID int not null,
w_day varchar(10) not null,
w_to  TIME not null,
W_from TIME not null,
Dm_lastupdt DATETIME not null,
primary key (timing_ID,w_day,w_to,w_from)
);
create table teacher_timing
(
T_ID int not null,
timing_ID int not null,
T_is_allocated varchar(1),
Dm_lastupdt DATETIME not null,
Primary key (T_ID,T_is_allocated),
foreign key (T_id) references Teacher(T_id),
foreign key (timing_ID) references timing_prefer(timing_ID)
);
create table teacher_spetialization
(
T_ID int not null,
pk int not null,
Dm_lastupdt DATETIME not null,
primary key (T_ID,pk),
foreign key (T_id) references Teacher(T_id),
foreign key (pk) references subject(pk)
);
create table student_subject
(
S_id int not null,
pk int not null,
is_completed varchar(1) not null,
DM_lastupdt DATETIME not null,
primary key (s_id,pk),
FOREIGN KEY (S_ID) REFERENCES Student(S_ID),
foreign key (pk) references subject(pk)
);
create table feedback
(
S_id int not null,
T_id int not null,
pk int not null,
feedback varchar (500),
S_T varchar(1),
Dm_lastupdt DATETIME not null,
primary key (S_id,T_id,pk,S_T),
FOREIGN KEY (S_ID) REFERENCES Student(S_ID),
foreign key (T_id) references Teacher(T_id),
foreign key (pk) references subject(pk)
);
create table teacher_student_subject 
(
S_ID int not null,
T_ID int not null,
timing_ID int not null,
pk int not null,
s_address varchar(255),
DM_lastupdt DATETIME not null,
is_completed varchar(1),
primary key (S_ID,T_ID,timing_ID),
FOREIGN KEY (S_ID) REFERENCES Student(S_ID),
foreign key (T_id) references Teacher(T_id),
foreign key (timing_ID) references timing_prefer(timing_ID),
foreign key (pk) references subject(pk)
);
create table notification
(
notify_ID int not null AUTO_INCREMENT,
S_ID int,
T_Id int,
Raised_by varchar(20) not null,
Msg_typ Varchar(20) not null,
Msg varchar(500) not null,
Dm_lastupdt DATETIME not null,
primary key(notify_ID),
FOREIGN KEY (S_ID) REFERENCES Student(S_ID),
foreign key (T_id) references Teacher(T_id)
);
ALTER TABLE notification AUTO_INCREMENT=500000000;
create table notification_archive
(
notify_ID int not null,
S_ID int,
T_Id int,
Raised_by varchar(20) not null,
Msg_typ Varchar(20) not null,
Msg varchar(500) not null,
Dm_lastupdt DATETIME not null,
primary key(notify_ID),
FOREIGN KEY (S_ID) REFERENCES Student(S_ID),
foreign key (T_id) references Teacher(T_id)
);
create table admin
(
Admin_ID int not null AUTO_INCREMENT,
Admin_F_name varchar(30) not null,
Admin_L_name varchar(30) not null,
Admin_access varchar(15) not null,
Dm_lastupdt DATETIME not null,
primary key (admin_ID)
);
CREATE TABLE Student_temp
(
S_ID 			int 		NOT NULL AUTO_INCREMENT,
S_DOB 			Date 		NOT NULL,
S_F_name 		varchar(30) not null,
S_L_name 		varchar(30) not null,
S_Gender 		varchar(1),
S_Standart 		Varchar(25),
S_School_name 	Varchar(50),
S_Extra 		Varchar(300),
S_Percent 		Varchar(7),
S_std_app	    Varchar(25),
S_fees 			int 		not null,
S_fees_remaining int 		not null,
S_Address 		varchar(255) not null,
S_adhar 		Varchar(25),
S_accecpted 	varchar(1) 	not null,
Dm_lastupdt DATETIME not null,
PRIMARY KEY (S_ID,S_F_name,S_L_name)
);
ALTER TABLE Student_temp AUTO_INCREMENT=1000000;
Create table Student_contact_temp
(
S_ID int not null,
S_contact BIGINT  not null,
Dm_lastupdt DATETIME not null,
PRIMARY KEY (S_ID,S_contact),
FOREIGN KEY (S_ID) REFERENCES Student_temp(S_ID)
);
Create table Student_reference_temp
(
S_ID int not null,
S_Reference varchar(25) not null,
Dm_lastupdt DATETIME not null,
PRIMARY KEY (S_ID,S_Reference),
FOREIGN KEY (S_ID) REFERENCES Student_temp(S_ID)
);
Create Table Teacher_temp
(
T_ID int not null AUTO_INCREMENT,
T_F_name varchar(25) not null,
T_L_name Varchar(25) not null,
T_DOB Date not null,
T_Gender varchar(1),
T_experience int,
T_address varchar(255),
T_Aadhar varchar(25),
T_Physically_Fit varchar(1),
T_location_to Varchar (50),
T_location_from Varchar (50),
T_resume_name varchar(30),
T_accepted varchar(1) not null,
Dm_lastupdt DATETIME not null,
PRIMARY Key (T_ID)
);
ALTER TABLE Teacher_temp AUTO_INCREMENT=2000000;
Create table teacher_contact_temp
(
T_ID int not null,
T_contact BIGINT  not null,
Dm_lastupdt DATETIME not null,
PRIMARY key (T_ID,T_contact),
FOREIGN KEY (T_ID) references Teacher_temp(T_ID)
);
Create Table teacher_reference_temp
(
T_ID int not null,
T_reference varchar(25),
Dm_lastupdt DATETIME not null,
Primary key (T_ID,T_reference),
foreign key (T_id) references Teacher_temp(T_id)
);
Create table subject_temp
(
pk int not null AUTO_INCREMENT,
Field_Id int not null,
field_nm varchar(30) not null,
Subject_Id int not null,
subject_name varchar(30) not null,
subject_period int not null,
class_id int not null,
class_name varchar(30) not null,
Board_id int not null,
Board_name varchar(30) not null,
Dm_lastupdt DATETIME not null,
PRIMARY Key (pk,Field_Id,Subject_Id,class_id,Board_id)
);
ALTER TABLE subject_temp AUTO_INCREMENT=3000000;
Create table timing_prefer_temp 
(
timing_ID int not null AUTO_INCREMENT,
w_day varchar(10) not null,
w_to  TIME not null,
W_from TIME not null,
Dm_lastupdt DATETIME not null,
primary key (timing_ID,w_day,w_to,w_from)
);
ALTER TABLE timing_prefer_temp AUTO_INCREMENT=4000000;
create table teacher_timing_temp
(
T_ID int not null,
timing_ID int not null,
T_is_allocated varchar(1),
Dm_lastupdt DATETIME not null,
Primary key (T_ID,T_is_allocated),
foreign key (T_id) references Teacher_temp(T_id),
foreign key (timing_ID) references timing_prefer_temp(timing_ID)
);
create table teacher_spetialization_temp
(
T_ID int not null,
pk int not null,
Dm_lastupdt DATETIME not null,
primary key (T_ID,pk),
foreign key (T_id) references Teacher_temp(T_id),
foreign key (pk) references subject_temp(pk)
);
create table Student_subject_temp
(
S_id int not null,
pk int not null,
is_completed varchar(1) not null,
DM_lastupdt DATETIME not null,
primary key (s_id,pk),
FOREIGN KEY (S_ID) REFERENCES Student_temp(S_ID),
foreign key (pk) references subject_temp(pk)
);