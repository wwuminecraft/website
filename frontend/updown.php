<?php

//All praise and thanks go to Jacek from Bukkit
//http://forums.bukkit.org/threads/help-working-minecraft-server-status-script-for-php.111783/

class minecraft_server {
 
    private $address;
    private $port;
 
    public function __construct($address, $port = 25565){
        $this->address = $address;
        $this->port = $port;
    }
 
    public function get_ping_info(&$info){
        $socket = @fsockopen($this->address, $this->port, $errno, $errstr, 1.0);
     
        if ($socket === false){
            return false;
        }
     
        fwrite($socket, "\xfe\x01");
     
        $data = fread($socket, 256);
     
        if (substr($data, 0, 1) != "\xff"){
            return false;
        }
     
        if (substr($data, 3, 5) == "\x00\xa7\x00\x31\x00"){
            $data = explode("\x00", mb_convert_encoding(substr($data, 15), 'UTF-8', 'UCS-2'));
        }else{
            $data = explode('§', mb_convert_encoding(substr($data, 3), 'UTF-8', 'UCS-2'));
        }
     
        if (count($data) == 3){
            $info = array(
                'version'        => '1.3.2',
                'motd'            => $data[0],
                'players'        => intval($data[1]),
                'max_players'    => intval($data[2]),
            );
        }else{
            $info = array(
                'version'        => $data[0],
                'motd'            => $data[1],
                'players'        => intval($data[2]),
                'max_players'    => intval($data[3]),
            );
        }
     
        return true;
    }
 
}

#$server = new minecraft_server('127.0.0.1', 25565);
 
#if (!$server->get_ping_info($info)){
    // oh no server is dead
#}else{
    // yay server is alive and you can use $info
#    print_r($info);
#}

$survival = new minecraft_server('127.0.0.1', 25565);
$hcpvp = new minecraft_server('127.0.0.1', 25566);
$ssmb1 = new minecraft_server('127.0.0.1', 25567);
$ssmb2 = new minecraft_server('127.0.0.1', 25568);
$ssmb3 = new minecraft_server('127.0.0.1', 25569);
$ssmb4 = new minecraft_server('127.0.0.1', 25570);

?>

<html>
    <head>
        <title>WWU MC UP/DOWN</title>
       <!--  <meta http-equiv='REFRESH' content='30;URL=updown.php' /> -->
    </head>
    <body>

<?

if (!$survival->get_ping_info($info)){
    // oh no server is dead
    ?>
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">SURVIVAL IS <span style="background-color:red; color: white; padding: 2px;">DOWN</span></h3>
            <p style="margin: 2px;">We're probably working on it, but feel free to <a href="mailto:wwuminecraftclub@gmail.com">email</a> us anyway.</p>
        </div>
    <?
}else{
    // yay server is alive and you can use $info
    ?> 
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">SURVIVAL IS <span style="background-color:green; color: white; padding: 2px;">UP</span></h3>
            <p style="margin: 2px;">Version: <? echo $info['version']?></p>
            <p style="margin: 2px;">Message of the Day: <? echo $info['motd']?></p>
            <p style="margin: 2px;">Players: <? echo $info['players']?>/<? echo $info['max_players']?></p>
        </div>
    <?
}

if (!$hcpvp->get_ping_info($info)){
    // oh no server is dead
    ?>
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">HCPVP IS <span style="background-color:red; color: white; padding: 2px;">DOWN</span></h3>
            <p style="margin: 2px;">We're probably working on it, but feel free to <a href="mailto:wwuminecraftclub@gmail.com">email</a> us anyway.</p>
        </div>
    <?
}else{
    // yay server is alive and you can use $info
    ?> 
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">HCPVP IS <span style="background-color:green; color: white; padding: 2px;">UP</span></h3>
            <p style="margin: 2px;">Version: <? echo $info['version']?></p>
            <p style="margin: 2px;">Message of the Day: <? echo $info['motd']?></p>
            <p style="margin: 2px;">Players: <? echo $info['players']?>/<? echo $info['max_players']?></p>
        </div>
    <?
}

if (!$ssmb1->get_ping_info($info)){
    // oh no server is dead
    ?>
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">SSMB 1 IS <span style="background-color:red; color: white; padding: 2px;">DOWN</span></h3>
            <p style="margin: 2px;">We're probably working on it, but feel free to <a href="mailto:wwuminecraftclub@gmail.com">email</a> us anyway.</p>
        </div>
    <?
}else{
    // yay server is alive and you can use $info
    ?> 
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">SSMB 1 IS <span style="background-color:green; color: white; padding: 2px;">UP</span></h3>
            <p style="margin: 2px;">Version: <? echo $info['version']?></p>
            <p style="margin: 2px;">Message of the Day: <? echo $info['motd']?></p>
            <p style="margin: 2px;">Players: <? echo $info['players']?>/<? echo $info['max_players']?></p>
        </div>
    <?
}

if (!$ssmb2->get_ping_info($info)){
    // oh no server is dead
    ?>
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">SSMB 2 IS <span style="background-color:red; color: white; padding: 2px;">DOWN</span></h3>
            <p style="margin: 2px;">We're probably working on it, but feel free to <a href="mailto:wwuminecraftclub@gmail.com">email</a> us anyway.</p>
        </div>
    <?
}else{
    // yay server is alive and you can use $info
    ?> 
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">SSMB 2 IS <span style="background-color:green; color: white; padding: 2px;">UP</span></h3>
            <p style="margin: 2px;">Version: <? echo $info['version']?></p>
            <p style="margin: 2px;">Message of the Day: <? echo $info['motd']?></p>
            <p style="margin: 2px;">Players: <? echo $info['players']?>/<? echo $info['max_players']?></p>
        </div>
    <?
}

if (!$ssmb3->get_ping_info($info)){
    // oh no server is dead
    ?>
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">SSMB 3 IS <span style="background-color:red; color: white; padding: 2px;">DOWN</span></h3>
            <p style="margin: 2px;">We're probably working on it, but feel free to <a href="mailto:wwuminecraftclub@gmail.com">email</a> us anyway.</p>
        </div>
    <?
}else{
    // yay server is alive and you can use $info
    ?> 
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">SSMB 3 IS <span style="background-color:green; color: white; padding: 2px;">UP</span></h3>
            <p style="margin: 2px;">Version: <? echo $info['version']?></p>
            <p style="margin: 2px;">Message of the Day: <? echo $info['motd']?></p>
            <p style="margin: 2px;">Players: <? echo $info['players']?>/<? echo $info['max_players']?></p>
        </div>
    <?
}

if (!$ssmb4->get_ping_info($info)){
    // oh no server is dead
    ?>
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">SSMB 4 IS <span style="background-color:red; color: white; padding: 2px;">DOWN</span></h3>
            <p style="margin: 2px;">We're probably working on it, but feel free to <a href="mailto:wwuminecraftclub@gmail.com">email</a> us anyway.</p>
        </div>
    <?
}else{
    // yay server is alive and you can use $info
    ?> 
        <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
            <h3 style="margin: 2px;">SSMB 4 IS <span style="background-color:green; color: white; padding: 2px;">UP</span></h3>
            <p style="margin: 2px;">Version: <? echo $info['version']?></p>
            <p style="margin: 2px;">Message of the Day: <? echo $info['motd']?></p>
            <p style="margin: 2px;">Players: <? echo $info['players']?>/<? echo $info['max_players']?></p>
        </div>
    <?
}

?>
    <div style="border: 2px solid black; width: 500px; padding: 5px; margin: 5px;">
        <h3 style="margin: 2px;">EXTRA INFO</h3>
        <h4 style="margin: 2px;">User Agent</h4>
        <p style="margin: 2px;"><?php echo $_SERVER['HTTP_USER_AGENT']?></p>
        <h4 style="margin: 2px;">Remote IP Address</h4>
        <p style="margin: 2px;"><?php echo $_SERVER['REMOTE_ADDR']?></p>
    </div>
    </body>
</html>
