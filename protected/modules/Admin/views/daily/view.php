<div class="div-item">
    <h2 class="items-title">GET Forget Password Of Mysql</h2>
    <div id="json" class="item-block add-transition">
         <li>net stop mysql</li>
        <li>mysqld --skip-grant-tables</li>
        <li>mysql -u root</li>
        <li>use mysql</li>
        <li>update mysql.user set password=password("root") where user="root"</li>
        <li>flush privileges</li>
        <li>net start mysql</li>
        <li>mysql -u root -p</li>
        <li>new password</li>
    </div>
</div>