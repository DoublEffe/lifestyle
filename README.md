<a name="readme-top"></a>


<div align="center">
  

  <h3 align="center">LifeStyle</h3>

  <p align="center">
    Backend for public services.
    <br />
    <a href="https://github.com/DoublEffe/lifestyle"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    ·
    <a href="https://github.com/DoublEffe/lifestyle/issues">Report Bug</a>
    ·
    <a href="https://github.com/DoublEffe/lifestyle/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
    </li>
    <li>
      <a href="#usage">Usage</a>
    </li> 
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

This is a backend supporting the better and afster acces to citizens to public sevices.



<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

This backedn ha been builded with php and mysql.

* [![php][php]][php-url]<br />
* [![mysql][mysql]][mysql-url]<br />

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

For this backend you need to install php and mysql.

### Launch the backend

* You need to have started a mysql server (use app like xampp).
* This will launch the backedn in local on port 8888.
  ```sh
  php -S 127.0.0.1:8888
  ```


<!-- USAGE EXAMPLES -->
## Usage

| Route | Request Methos | Description |
| ----- | -------------- | ----------- | 
| / | GET , POST | get all resources by bonus generic type , create new bonus type | 
| /{id} | GET , DELETE , UPDATE | get single resources , delete single resources , update single resources | 
| /bonuses | GET , POST | get all resources by specific bonus , create new specific | 
| /bonuses/{id} | GET , DELETE , UPDATE | get single resources , delete single resources , update single resources | 
| /filters | GET | filters by bonus type, between date and sum of the time saved |

N.B. to pass prameters to filters route: 
* /filters?name="examplename"
* /filters?dateS="2024-05-30"&dateE="2024-05-30"
* /filters?sum

| Response Code | Description |
| ------ | ------ |
| 200 | OK |
| 201 | CREATED |
| 400 | BAD REQUEST |
| 404 | NOT FOUND |
| 500 | INTERNAL ERROR |


<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!--variables-->
[php]: https://img.shields.io/badge/Php-grey?style=for-the-badge&logo=php
[mysql]: https://img.shields.io/badge/Mysql-grey?style=for-the-badge&logo=mysql
[php-url]: https://www.php.net/
[mysql-url]: https://www.mysql.com/

