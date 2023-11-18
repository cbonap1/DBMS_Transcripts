--create database
CREATE DATABASE UNIVERSITY;

--use database UNIVERSITY
USE UNIVERSITY;

--TABLE STUDENTS
CREATE TABLE STUDENTS(
  studentid INT(11) NOT NULL,
  lastname VARCHAR(80) NOT NULL,
  firstname VARCHAR(80) NOT NULL,
  dob date NULL,
  CONSTRAINT STUDENTS_PK PRIMARY KEY(studentid)
  );
  --Insert Values into Students
  Insert INTO STUDENTS(studentid, lastname, firstname, dob)
  ->VALUES('01','Smith','John','1999-11-03');
  INSERT INTO STUDENTS(studentid, lastname, firstname, dob)
  ->VALUES('02','Park','Michael','2000-12-25');
  INSERT INTO STUDENTS(studentid, lastname, firstname, dob)
  ->VALUES('03', 'Waters', 'Jessica', '2001-06-12');
  INSERT INTO STUDENTS(studentid, lastname, firstname, dob)
  ->VALUES('04', 'Doe', 'Jane', '2002-09-04');

--DISPLAY STUDENTS TABLE WITH VALUES
SELECT * FROM STUDENTS;

--TABLE COURSES
  CREATE TABLE COURSES(
    courseid INT(11) NOT NULL,
    coursename VARCHAR(40) NOT NULL,
    credits DOUBLE NOT NULL,
    CONSTRAINT COURSES_PK PRIMARY KEY(courseid)
    );
--INSERT VALUES INTO COURSES
    INSERT INTO COURSES(courseid, coursename, credits)
    ->VALUES('0145443','Database Management Systems', '3');
    INSERT INTO COURSES(courseid, coursename, credits)
    ->VALUES('301001', 'C Programming', '4');
    INSERT INTO COURSES(courseid, coursename, credits)
    ->VALUES('481001','Computer Science Senior Seminar', '1');
    INSERT INTO COURSES(courseid, coursename, credits)
    ->VALUES('225001','Statistics and Data Analytics', '4');
--DISPLAY COURSES TABLE WITH VALUES
SELECT * FROM COURSES;

--TABLE GRADES
    CREATE TABLE GRADES(
      term VARCHAR(10) NOT NULL,
      courseid INT(11) NOT NULL,
      studentid INT(11) NOT NULL,
      grade VARCHAR(2) NOT NULL,
      CONSTRAINT GRADES_PK PRIMARY KEY(term, courseid, studentid),
      CONSTRAINT GRADES_COURSES_FK FOREIGN KEY(courseid) REFERENCES COURSES(courseid),
      CONSTRAINT GRADES_STUDENTS_FK FOREIGN KEY(studentid) REFERENCES STUDENTS(studentid)
      );
      --INSERT VALUES INTO GRADES
      INSERT INTO GRADES(term, courseid, studentid, grade)
      ->VALUES('Spring 2023', '0145443','01','A');
      INSERT INTO GRADES(term, courseid, studentid, grade)
      ->VALUES('Fall 2022','301001','02','D');
      INSERT INTO GRADES(term, courseid, studentid, grade)
      ->VALUES('Summer 2020','481001','03','C');
      INSERT INTO GRADES(term, courseid, studentid, grade)
      ->VALUES('Fall 2022', '225001','04','A');
    --DISPLAY GRADES TABLE WITH VALUES
        SELECT * FROM GRADES;
      