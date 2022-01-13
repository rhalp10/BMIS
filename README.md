# BMIS 
Barangay Management Information System (BMIS) is created to facilitate and attain efficient way for every level of management within the Barangay and support through technology by eliminating the time and labor that the beneficiary may consume and this system would give a good quality of service of the Barangay office tasks.

Please use this for educational purposes only and don't forget to cite.
For more information on these repository you can browse the book on cvsu library call number: [658.4038 C11 2018](http://library.cvsu.edu.ph/cgi-bin/koha/opac-detail.pl?biblionumber=26519&shelfbrowse_itemnumber=22556#holdings)

## Modules
- Account Management   
- Barangay Officials 
- Resident Profiling  
- Finance Management   
- Health and Sanitation  
- Peace and Order  
- Clearances and Forms  
- Communication  
- Special Project 
- Report  

Installation
----------------
You can choose one from multiple ways for installation.

**GitHub Fork/Clone**
- Fork the repository ([here is the guide](https://help.github.com/articles/fork-a-repo/)).
- Clone to your machine
```
git clone https://github.com/rhalp10/BMIS.git
```
 - Download the [repository](https://github.com/rhalp10/BMIS/archive/refs/heads/master.zip) 
 
**Note**
 - windows 11 will require you to indicate port on your db configuration. Change port number on these files.
 ```DIR 
 db.php
 peace_and_order/lib/class.database.php
 ```
 - You can find your mysql port in `my.ini` file.
## Requirements 
- Maria 10.4.10+ / MySQL 8.0.18+   
- phpMyAdmin 4.9.2 
- Apache 2.4.41 
- PHP 7.1.33

## Demo credentials
| Username       | Password       |
|----------------|----------------|
| admin          | admin          |
| captain        | captain        |
| infrastructure | infrastructure |
| Finance        | Finance        |
| Sports         | Sports         |
| Education      | education      |
| Treasurer      | Treasurer      |
| Chairman       | Chairman       |
| healthworker   | healthworker   |
| Peace          | Peace          |

----------
# What's Included? 
- [Bootstrap 3.3.6](https://getbootstrap.com) [[MIT](https://github.com/twbs/bootstrap/blob/main/LICENSE)]  - An open source design system for HTML, CSS, and JS.
- [FPDF](http://www.fpdf.org/) [[MIT](http://www.fpdf.org/en/FAQ.php#q1)] - An open source PHP class which allows to generate PDF files with pure PHP.
- [chart.js](https://www.chartjs.org/) [[MIT](https://github.com/chartjs/Chart.js/blob/master/LICENSE.md)] - Chart.js is a free open-source JavaScript library for data visualization, which supports 8 chart types: bar, line, area, pie, bubble, radar, polar, and scatter.
- [DataTables](https://datatables.net) [[MIT](https://datatables.net/license/mit)] - DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table.
- [Jquery](https://jquery.com) [[MIT](https://tldrlegal.com/license/mit-license)] - jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers. With a combination of versatility and extensibility, jQuery has changed the way that millions of people write JavaScript.
- [SMSGateway](https://smsgateway.me) - SMS Gateway API is a service that allows you to send and received messages programmically from your android phone.

# License
Barangay Management Information System (BMIS) licensed as [MIT](https://github.com/rhalp10/BMIS/blob/master/LICENSE)
