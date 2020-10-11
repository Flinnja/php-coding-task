# Questions

## Question 1
Q. What does the `final` keyword mean the [DownloadLog](orm/DownloadLog.php) model? What are the implications in removing the `final` declaration?

A. The keyword `final` when used on a class prevents that class from being inherited. For instance, if we wanted to create a child class using `class DownloadLogChild extends DownloadLog` we would see a fatal error. In other cases the `final` keyword can be used to prevent the overriding of functions.

If we were to remove the `final` keyword from line 7, then the class could be inherited, which may not necessarily be a problem (depending on the functionality of the child class) but the `DownloadLog` model describes a very clear and concise function. Depending on the design of the application it is worth considering whether any new feature requirements either a) need to be built in to DownLoadlog itself or b) should be defined as their own, separate classes with exclusive functionality.


## Question 2
Q. The current of implementation of [DownloadLog](orm/DownloadLog.php) contains a fatal error. What is it, and how would it be resolved?

A. `DownloadLog` extends `ActiveRecord`, which implements `ActiveRecordInterface`. Since `ActiveRecordInterface` is an `interface` then all implementations must implement the functions described in the interface. Neither `ActiveRecord` nor `DownloadLog` itself describe the `isModified()` function required by `ActiveRecordInterface`, and so the fatal error occurs.

This could be solved by including an `isModified()` function which returns a boolean in either `DownloadLog` or `ActiveRecord` (since the former extends the latter).
