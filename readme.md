## Codeigniter-Auth

### 01. Execution environment
 - Xampp Control Panel v3.3.0
 - PHP 8.1.2
 - MySQL
 - Composer version 2.0.13

### 02. File to Use
 - Config / Remember
   - .env : Database info
   - App.php , .htaccess : do not display index.php
     - public $indexPage = '';
   - Filters.php : add custom filters
     - AuthCheck , AlreadyLoggedIn
   - Filters , Libraries
 - Model
   - usersModel.php : users 테이블
 - View
   - auth
     - login.php : 로그인하는 페이지
     - register.php : 회원가입하는 페이지
   - dashboard
     - index.php : 대시보드 페이지
     - profile.php : 개인 프로필 페이지
 - Controller
   - Auth.php : 로그인 , 회원가입에 해당하는 컨트롤러
   - Dashboard.php : 대시보드 , 개인 프로필에 해당하는 컨트롤러
 - Routing
   - Routes.php : 라우팅 설정과 필터링 설정
