<?php

define('token',"7035842554:AAESWQ6b_56NYbZKgAPlTg5TfT-S1OzbwNE");


$admin = "1110160358";////admin id
$kanal = 'munisa_onlinesavdo_wechat';///Reklama tashlanadigan kanal
function getAdmin($chat){
$url = "https://api.telegram.org/bot".API_KEY."/getChatAdministrators?chat_id=@".$chat;
$result = file_get_contents($url);
$result = json_decode ($result);
return $result->ok;
}

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".token."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

///majburiy azolik
function joinchat($cid){
global $mid;
$array = array("inline_keyboard");
$get = file_get_contents("admin/kanal.txt");
$ex = explode("\n",$get);
if($get == null){
return true;
	}else{
for($i=0;$i<=count($ex) -1;$i++){
$url = explode("\n",$get)[$i]; 
$a = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getchat?chat_id=$url"));
$name = $a->result->title;
     $ret = bot("getChatMember",[
         "chat_id"=>"$url",
         "user_id"=>$cid,
         ]);
$stat = $ret->result->status;
         if((($stat=="creator" or $stat=="administrator" or $stat=="member"))){
      $array['inline_keyboard']["$i"][0]['text'] = "✅ ". $name;
      $array['inline_keyboard']["$i"][0]['url'] = "https://t.me/".str_replace('@','',$url);
         }else{
  $array['inline_keyboard']["$i"][0]['text'] = "❌ ". $name;
      $array['inline_keyboard']["$i"][0]['url'] = "https://t.me/".str_replace('@','',$url);
$uns = true;
}
}
$array['inline_keyboard']["$i"][0]['text'] = "🔄 Tekshirish";
$array['inline_keyboard']["$i"][0]['callback_data'] = "result";
if($uns == true){
     bot('sendMessage',[
         'chat_id'=>$cid,
         'text'=>"⛔️ <b>Botdan to'liq foydalanish uchun</b> quyidagi kanallarga obuna bo'ling:",
'parse_mode'=>html,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode($array),
]);  
exit();
return false;
}else{
return true;
}
}
}
function deleteFolder($path){
if(is_dir($path) === true){
$files = array_diff(scandir($path), array('.', '..'));
foreach ($files as $file)
deleteFolder(realpath($path) . '/' . $file);
return rmdir($path);
}else if (is_file($path) === true)
return unlink($path);
return false;
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$name = $message->from->first_name;
$botname = bot('getme',['bot'])->result->username;
$id = $message->from->id;
$cid = $message->chat->id;
$chat_id = $message->chat->id;
$text = $message->text;
$cid2 = $update->callback_query->message->chat->id;

$mid = $message->message_id;
$idi = $update->inline_query->id;
$baza = file_get_contents("step/$chat_id.txt");
$files = json_decode(file_get_contents('files.json'),1);
$username = $message->from->username;
  $mid2 = $update->callback_query->message->message_id;
$step = file_get_contents("step/$cid.step");
if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
  $message_id = $update->callback_query->message->message_id;
  $data = $update->callback_query->data;
}
$adb = file_get_contents("admin.db");
$statis = file_get_contents("stat/azolar.txt");
$stat = substr_count($statis,"\n");

if(!file_exists("admin/kanal.txt")){
file_put_contents("admin/kanal.txt","@CyberCodeUz\n@FreeAdsUz");
}
   $kanall = file_get_contents("admin/kanal.txt");

    if(file_get_contents("admin/qollanma.txt")){
  }else{
		if(file_put_contents("admin/qollanma.txt",'Kiritilmagan!'));
		}
		if(file_get_contents("admin/ref.txt")){
	}else{
		if(file_put_contents("admin/ref.txt",'500'));
		}
		if(file_get_contents("admin/rekn.txt")){
	}else{
		if(file_put_contents("admin/rekn.txt",'3000'));
		}
		if(file_get_contents("admin/valyuta.txt")){
	}else{
		if(file_put_contents("admin/valyuta.txt",'sõm'));
		}
		//////tugmalar
		if(file_get_contents("tugma/key1.txt")){
	}else{
		if(file_put_contents("tugma/key1.txt",'📨 Reklama bo‘limi'));
		}
		if(file_get_contents("tugma/key2.txt")){
	}else{
		if(file_put_contents("tugma/key2.txt",'📱 Kabinet'));
		}
		if(file_get_contents("tugma/key3.txt")){
	}else{
		if(file_put_contents("tugma/key3.txt",'🏦 Pul ishlash'));
		}
		if(file_get_contents("tugma/key4.txt")){
	}else{
		if(file_put_contents("tugma/key4.txt",'🎲 O‘yinlar o‘ynash'));
		}
		if(file_get_contents("tugma/key5.txt")){
	}else{
		if(file_put_contents("tugma/key5.txt",'☎️ Bog‘lanish'));
		}
		if(file_get_contents("tugma/key6.txt")){
	}else{
		if(file_put_contents("tugma/key6.txt",'📖 Qo‘llanma'));
		}
		
		
$key1 = file_get_contents("tugma/key1.txt");
$key2 = file_get_contents("tugma/key2.txt");
$key3 = file_get_contents("tugma/key3.txt");
$key4 = file_get_contents("tugma/key4.txt");
$key5 = file_get_contents("tugma/key5.txt");
$key6 = file_get_contents("tugma/key6.txt");

$valyuta = file_get_contents("admin/valyuta.txt");
$reknarx = file_get_contents("admin/rekn.txt");
$ref = file_get_contents("admin/ref.txt");
$qollanma = file_get_contents("admin/qollanma.txt");
$iduz = file_get_contents("admin/iduz.txt");

if(isset($message)){
   $baza=file_get_contents("stat/azolar.txt");
   if(mb_stripos($baza,$cid) !==false){
   }else{
   $txt="
$cid";
   $file=fopen("stat/azolar.txt","a");
   fwrite($file,$txt);
   fclose($file);
   }
}
$bekor = json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"❌ Bekor qilish"]],
	]]);
	


mkdir("step");
mkdir("balans");
mkdir("stat");
mkdir("admin");
mkdir("tugma");


$adm = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⚙️ Boshqarish"]],
]]);

$admpan = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔊 Kanallarni sozlash"]],
[['text'=>"📊 Statistika"],['text'=>"📖 Pochta"]],
[['text'=>"📚 Qo'llanma matni"]],
[['text'=>"📋 Userga Xabar"],['text'=>"🎛️ Tugmalar"]],
[['text'=>"🔊 Rek narxi"],['text'=>"👥 Referal narxi"]],
[['text'=>"💱 Valyuta"],['text'=>"📂 Bot kodi"]],
[['text'=>"❌ Ortga qaytish"]],
]]);

$back= json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"❌ Ortga qaytish"]],
]]);

$menu = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"$key1"]],
[['text'=>"$key2"],['text'=>"$key3"]],
/*[['text'=>"$key4"]],*/
[['text'=>"$key5"],['text'=>"$key6"]],
]]);
$menuad = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"$key1"]],
[['text'=>"$key2"],['text'=>"$key3"]],
/*[['text'=>"$key4"]],*/
[['text'=>"$key5"],['text'=>"$key6"]],
[['text'=>"⚙️ Boshqarish"]],
]]);
if($chat_id==$admin){
	$menu=$menuad;
	}else{
		$menu=$menu;
		}
if(!file_exists("balans/$cid.txt")){
file_put_contents("balans/$cid.txt","0");
}
$pul = file_get_contents("balans/$cid.txt");

$ids=file_get_contents("users.id");
if(mb_stripos($text,"/start ")!==false){
$id=explode(" ",$text)[1];
if($id==$chat_id){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 O'zingizni taklif qila olmaysiz!",
'reply_markup'=>$menu,
]);
}else{
if(mb_stripos($ids,$chat_id)!==false and joinchat($cid)=="true"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🖥️ <b>Asosiy menyudasiz</b>!",
'parse_mode'=>"html",
'reply_markup'=>$menu,
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"<b>👋 Assalomu aleykum $name !

@$botname ga xush kelibsiz!</b>",
'parse_mode'=>"html",
'reply_markup'=>$menu,
]);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"👤 <b>Siz <a href='tg://user?id=$chat_id'>$name</a> ni taklif qildingiz va sizga $ref $valyuta berildi</b>",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
$pul=file_get_contents("balans/$id.txt");
$b=$pul+$ref;
file_put_contents("balans/$id.txt",$b);
file_put_contents("users.id",$ids."\n".$cid);
}
}
}
$sends = json_encode([
	'inline_keyboard'=>[
	[['text'=>"💎 Kanalimiz",'url'=>"https://t.me/$kanal"]],
	]]);
$ort = json_encode([
	'inline_keyboard'=>[
	[['text'=>"◀️ Orqaga",'callback_data'=>"asosiy"]],
	]]);
	
if($text=="/start" or $text == "❌ Ortga qaytish" and joinchat($cid)=="true"){
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>👋 Assalomu aleykum $name</b>!",
	'parse_mode'=>"html",
	'reply_markup'=>$menu,
]);
unlink("step/$cid.step");
unlink("admin.db");
}
if($text=="$key3" and joinchat($cid)=="true"){
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"📖 <b>Marxamat, tugmani tanlang!</b>",
	'parse_mode'=>"html",
'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"🖇️ Takliflar",'callback_data'=>"ref"]],
	/*[['text'=>"🎲 O'yinlar",'callback_data'=>"games"]],*/
	[['text'=>"◀️ Orqaga",'callback_data'=>"asosiy"]],
	]]),
]);
}
if($data == "ishlash" and joinchat($cid2)=="true"){
	bot('DeleteMessage',[
	'chat_id'=>$chat_id,
	'message_id'=>$message_id,
	]);
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"📖 <b>Marxamat, tugmani tanlang!</b>",
	'parse_mode'=>"html",
'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"🖇️ Takliflar",'callback_data'=>"ref"]],
	/*[['text'=>"🎲 O'yinlar",'callback_data'=>"games"]],*/
	[['text'=>"◀️ Orqaga",'callback_data'=>"asosiy"]],
	]]),
]);
}

/*if($text == "$key4" and joinchat($cid)=="true"){
	bot('DeleteMessage',[
	'chat_id'=>$chat_id,
	'message_id'=>$mid,
	]);
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"📖 <b>Marxamat, tugmani tanlang!</b>",
	'parse_mode'=>"html",
	'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎯", 'callback_data'=>"1"],['text'=>"🎲",'callback_data'=>"2"]],
[['text'=>"🎳",'callback_data'=>"3"],['text'=>"⚽",'callback_data'=>"4"],['text'=>"🏀",'callback_data'=>"5"]],
[['text'=>"🎰",'callback_data'=>"6"]],
]
]),
]);
}

if($data == "games"){
	bot('DeleteMessage',[
	'chat_id'=>$chat_id,
	'message_id'=>$message_id,
	]);
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"📖 <b>Marxamat, tugmani tanlang!</b>",
	'parse_mode'=>"html",
	'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎯", 'callback_data'=>"1"],['text'=>"🎲",'callback_data'=>"2"]],
[['text'=>"🎳",'callback_data'=>"3"],['text'=>"⚽",'callback_data'=>"4"],['text'=>"🏀",'callback_data'=>"5"]],
[['text'=>"🎰",'callback_data'=>"6"]],
]
]),
]);
}*/
if($data == "1"){
	bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>🎯 Oʻyinini 1 marotaba oʻynash narxi 1000 $valyuta.
• Oʻyinda siz 2000 $valyuta gacha yutib olishingiz mumkin.
• Hisobingizda yitarlicha mablag' borligiga ishonch hosil qiling va 🎯 O'ynash tugmasini bosing.</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎯 O'ynash", 'callback_data'=>"ok1"]],
]
]),
]);
}

if($data == "ok1"){
	$pul = file_get_contents("balans/$cid2.txt");
    if($pul>"1000"){
    bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
  $dic = bot('senddice',[
      'chat_id'=>$cid2,
      'emoji'=>"🎯",
  ])->result->dice->value;
   if($dic=="1"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="2"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="3"){
   $tx="1000";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1000 $valyuta";
}
   if($dic=="4"){
   $tx="1500";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1500 $valyuta";
}
   if($dic=="5"){
   $tx="1700";
   $er="😍 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1700 $valyuta";
}
   if($dic=="6"){
   $tx="2000";
   $er="🤩 Oʻyinda gʻalaba qozondingiz. Sizning yutugʻingiz 2000 $valyuta";
}
$balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans-"1000";
  $b = file_put_contents("balans/$cid2.txt","$plus");
  $balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans+$tx;
  $b = file_put_contents("balans/$cid2.txt","$plus");
      bot('sendmessage', [
      'chat_id' =>$cid2,
      'text' => "<b>$er</b>",
      'parse_mode' => 'html',
      'disable_web_page_preview' => true,
  ]);
}else{
	bot("sendMessage",[
         "chat_id"=>$cid2,
'text'=>"<b>O'yin o'ynash uchun balansingizda pul kam. O'yin narxi: 1000 $valyuta</b>",
'parse_mode'=>'html',
]);  
}
}

if($data == "2"){
	bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>🎲 Oʻyinini 1 marotaba oʻynash narxi 1000 $valyuta.
• Oʻyinda siz 2000 $valyuta gacha yutib olishingiz mumkin.
• Hisobingizda yitarlicha mablag' borligiga ishonch hosil qiling va 🎲 O'ynash tugmasini bosing.</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎲 O'ynash", 'callback_data'=>"ok2"]],
]
]),
]);
}
if($data == "ok2"){
	$pul = file_get_contents("balans/$cid2.txt");
    if($pul>"1000"){
    bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
  $dic = bot('senddice',[
      'chat_id'=>$cid2,
      'emoji'=>"🎲",
  ])->result->dice->value;
   if($dic=="1"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="2"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="3"){
   $tx="1000";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1000 $valyuta";
}
   if($dic=="4"){
   $tx="1500";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1500 $valyuta";
}
   if($dic=="5"){
   $tx="1700";
   $er="😍 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1700 $valyuta";
}
   if($dic=="6"){
   $tx="2000";
   $er="🤩 Oʻyinda gʻalaba qozondingiz. Sizning yutugʻingiz 2000 $valyuta";
}
$balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans-"1000";
  $b = file_put_contents("balans/$cid2.txt","$plus");
  $balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans+$tx;
  $b = file_put_contents("balans/$cid2.txt","$plus");
      bot('sendmessage', [
      'chat_id' =>$cid2,
      'text' => "<b>$er</b>",
      'parse_mode' => 'html',
      'disable_web_page_preview' => true,
  ]);
}else{
	bot("sendMessage",[
         "chat_id"=>$cid2,
'text'=>"<b>O'yin o'ynash uchun balansingizda pul kam. O'yin narxi: 1000 $valyuta</b>",
'parse_mode'=>'html',
]);  
}
}

if($data == "3"){
	bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>🎳 Oʻyinini 1 marotaba oʻynash narxi 1000 $valyuta.
• Oʻyinda siz 2000 $valyuta gacha yutib olishingiz mumkin.
• Hisobingizda yitarlicha mablag' borligiga ishonch hosil qiling va 🎳 O'ynash tugmasini bosing.</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎳 O'ynash", 'callback_data'=>"ok3"]],
]
]),
]);
}
if($data == "ok3"){
	$pul = file_get_contents("balans/$cid2.txt");
    if($pul>"1000"){
    bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
  $dic = bot('senddice',[
      'chat_id'=>$cid2,
      'emoji'=>"🎳",
  ])->result->dice->value;
   if($dic=="1"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="2"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="3"){
   $tx="1000";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1000 $valyuta";
}
   if($dic=="4"){
   $tx="1500";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1500 $valyuta";
}
   if($dic=="5"){
   $tx="1700";
   $er="😍 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1700 $valyuta";
}
   if($dic=="6"){
   $tx="2000";
   $er="🤩 Oʻyinda gʻalaba qozondingiz. Sizning yutugʻingiz 2000 $valyuta";
}
$balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans-"1000";
  $b = file_put_contents("balans/$cid2.txt","$plus");
  $balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans+$tx;
  $b = file_put_contents("balans/$cid2.txt","$plus");
      bot('sendmessage', [
      'chat_id' =>$cid2,
      'text' => "<b>$er</b>",
      'parse_mode' => 'html',
      'disable_web_page_preview' => true,
  ]);
}else{
	bot("sendMessage",[
         "chat_id"=>$cid2,
'text'=>"<b>O'yin o'ynash uchun balansingizda pul kam. O'yin narxi: 1000 $valyuta</b>",
'parse_mode'=>'html',
]);  
}
}

if($data == "4"){
	bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>⚽ Oʻyinini 1 marotaba oʻynash narxi 1000 $valyuta.
• Oʻyinda siz 2000 $valyuta gacha yutib olishingiz mumkin.
• Hisobingizda yitarlicha mablag' borligiga ishonch hosil qiling va ⚽ O'ynash tugmasini bosing.</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⚽ O'ynash", 'callback_data'=>"ok4"]],
]
]),
]);
}

if($data == "ok4"){
	$pul = file_get_contents("balans/$cid2.txt");
    if($pul>"1000"){
    bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
  $dic = bot('senddice',[
      'chat_id'=>$cid2,
      'emoji'=>"⚽",
  ])->result->dice->value;
   if($dic=="1"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="2"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="3"){
   $tx="1000";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1000 $valyuta";
}
   if($dic=="4"){
   $tx="1500";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1500 $valyuta";
}
   if($dic=="5"){
   $tx="1700";
   $er="😍 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1700 $valyuta";
}
   if($dic=="6"){
   $tx="2000";
   $er="🤩 Oʻyinda gʻalaba qozondingiz. Sizning yutugʻingiz 2000 $valyuta";
}
$balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans-"1000";
  $b = file_put_contents("balans/$cid2.txt","$plus");
  $balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans+$tx;
  $b = file_put_contents("balans/$cid2.txt","$plus");
      bot('sendmessage', [
      'chat_id' =>$cid2,
      'text' => "<b>$er</b>",
      'parse_mode' => 'html',
      'disable_web_page_preview' => true,
  ]);
}else{
	bot("sendMessage",[
         "chat_id"=>$cid2,
'text'=>"<b>O'yin o'ynash uchun balansingizda pul kam. O'yin narxi: 1000 $valyuta</b>",
'parse_mode'=>'html',
]);  
}
}

if($data == "5"){
	bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>🏀 Oʻyinini 1 marotaba oʻynash narxi 1000 $valyuta.
• Oʻyinda siz 2000 $valyuta gacha yutib olishingiz mumkin.
• Hisobingizda yitarlicha mablag' borligiga ishonch hosil qiling va 🏀 O'ynash tugmasini bosing.</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🏀 O'ynash", 'callback_data'=>"ok5"]],
]
]),
]);
}

if($data == "ok5"){
	$pul = file_get_contents("balans/$cid2.txt");
    if($pul>"1000"){
    bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
  $dic = bot('senddice',[
      'chat_id'=>$cid2,
      'emoji'=>"🏀",
  ])->result->dice->value;
   if($dic=="1"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="2"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="3"){
   $tx="1000";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1000 $valyuta";
}
   if($dic=="4"){
   $tx="1500";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1500 $valyuta";
}
   if($dic=="5"){
   $tx="1700";
   $er="😍 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1700 $valyuta";
}
   if($dic=="6"){
   $tx="2000";
   $er="🤩 Oʻyinda gʻalaba qozondingiz. Sizning yutugʻingiz 2000 $valyuta";
}
$balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans-"1000";
  $b = file_put_contents("balans/$cid2.txt","$plus");
  $balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans+$tx;
  $b = file_put_contents("balans/$cid2.txt","$plus");
      bot('sendmessage', [
      'chat_id' =>$cid2,
      'text' => "<b>$er</b>",
      'parse_mode' => 'html',
      'disable_web_page_preview' => true,
  ]);
}else{
	bot("sendMessage",[
         "chat_id"=>$cid2,
'text'=>"<b>O'yin o'ynash uchun balansingizda pul kam. O'yin narxi: 1000 $valyuta</b>",
'parse_mode'=>'html',
]);  
}
}

if($data == "6"){
	bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
bot('sendMessage',[
'chat_id'=>$cid2,
'text'=>"<b>🎰 Oʻyinini 1 marotaba oʻynash narxi 1000 $valyuta.
• Oʻyinda siz 2000 $valyuta gacha yutib olishingiz mumkin.
• Hisobingizda yitarlicha mablag' borligiga ishonch hosil qiling va 🎰 O'ynash tugmasini bosing.</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🎰 O'ynash", 'callback_data'=>"ok6"]],
]
]),
]);
}

if($data == "ok6"){
	$pul = file_get_contents("balans/$cid2.txt");
    if($pul>"1000"){
    bot('deleteMessage',[
'chat_id'=>$cid2,
'message_id'=>$message_id,
]);
  $dic = bot('senddice',[
      'chat_id'=>$cid2,
      'emoji'=>"🎰",
  ])->result->dice->value;
   if($dic=="1"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="2"){
   $tx="0";
   $er="😭 Oʻyinida magʻlub boʻldingiz.";
}
   if($dic=="3"){
   $tx="1000";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1000 $valyuta";
}
   if($dic=="4"){
   $tx="1500";
   $er="😕 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1500 $valyuta";
}
   if($dic=="5"){
   $tx="1700";
   $er="😍 Oʻyinda gʻalabaga yaqin edingiz. Sizning yutugʻingiz 1700 $valyuta";
}
   if($dic=="6"){
   $tx="2000";
   $er="🤩 Oʻyinda gʻalaba qozondingiz. Sizning yutugʻingiz 2000 $valyuta";
}
$balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans-"1000";
  $b = file_put_contents("balans/$cid2.txt","$plus");
  $balans= file_get_contents("balans/$cid2.txt");
     $plus=$balans+$tx;
  $b = file_put_contents("balans/$cid2.txt","$plus");
      bot('sendmessage', [
      'chat_id' =>$cid2,
      'text' => "<b>$er</b>",
      'parse_mode' => 'html',
      'disable_web_page_preview' => true,
  ]);
}else{
	bot("sendMessage",[
         "chat_id"=>$cid2,
'text'=>"<b>O'yin o'ynash uchun balansingizda pul kam. O'yin narxi: 1000 $valyuta</b>",
'parse_mode'=>'html',
]);  
}
}
if($text == "$key6" and joinchat($cid)=="true"){
	bot('SendPhoto',[
	'photo'=>"https://t.me/AbduraxmonovUz/128",
	'chat_id'=>$chat_id,
	'caption'=>"$qollanma",
	'parse_mode'=>"html",
	'reply_markup'=>$sends,
	]);
	}
if($data == "asosiy"){
	bot('DeleteMessage',[
	'chat_id'=>$chat_id,
	'message_id'=>$message_id,
	]);
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>🖥️ Asosiy menyuga qaytdingiz </b>",
	'parse_mode'=>"html",
	'reply_markup'=>$menu,
	]);
	unlink("step/$cid.step");
	}

if($data=="ref"){
	bot('DeleteMessage',[
	'chat_id'=>$chat_id,
	'message_id'=>$message_id,
	]);
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"🖇️ <b>Sizning takliv havolalarigiz:</b>

<pre>https://t.me/$botname?start=$chat_id</pre>
<pre>tg://resolve?domain=$botname&start=$chat_id</pre>

💰 <b>Har bir taklif uchun $ref $valyuta dan olasiz</b>",
	'parse_mode'=>"html",
	'reply_markup'=>$ort,
]);
}

if($text == "$key2" and joinchat($cid)=="true"){
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"🔎 <b>Sizning ID raqamingiz: </b><pre>$chat_id</pre>\n\n🖇️ <b>Ismingiz: $name\n💵 Balansingiz:  $pul $valyuta\n\n🏦 Taklif narxi: $ref $valyuta\n🛍️ Reklama narxi: $reknarx $valyuta</b>",
	'parse_mode'=>"html",
	'reply_markup'=>$ort,
	]);
	}
	if($text=="$key5" and joinchat($cid)=="true"){
		file_put_contents("step/$cid.step","sup");
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"✍️ <b>Murojaat matnini kiriting</b>",
	'parse_mode'=>"html",
    'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"❌ Ortga qaytish"]],
	]]),
	]);
	}
	if($data=="sup" and joinchat($cid2)=="true"){
		file_put_contents("step/$cid2.step","sup");
		bot('DeleteMessage',[
		'chat_id'=>$cid2,
		'message_id'=>$message_id,
		]);
	bot('SendMessage',[
	'chat_id'=>$cid2,
	'text'=>"✍️ <b>Murojaat matnini kiriting</b>",
	'parse_mode'=>"html",
    'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"❌ Ortga qaytish"]],
	]]),
	]);
	}
	if($step == "sup"){
		if($text == "❌ Ortga qaytish"){}else{
		bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"✅ <b>Muvaffaqiyatli yuborildi!</b>\n\n<i>Tez orada javob qaytaramiz!</i>",
	'parse_mode'=>"html",
	'reply_markup'=>$menu,
	]);
	bot('SendMessage',[
	'chat_id'=>$admin,
	'text'=>"<b>📥 Yangi murojaat!

👤 Ism: <a href='tg://user?id=$cid'>$name</a>
🖇️ User: @$username

📨 Tekst: $text</b>",
	'parse_mode'=>"html",
	'reply_markup'=>json_encode([
		'inline_keyboard'=>[
			[['text'=>"Javob berish",'callback_data'=>"javob-$chat_id"]]
		]
	]),
	]);
	unlink("step/$cid.step");
	}
	}
	if($text == "📊 Statistika" and joinchat($cid)=="true"){
		if($cid==$admin){
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"📊 <b>Bot statistikasi:

👤 A'zolar: $stat ta</b>",
	'parse_mode'=>"html",
	'reply_markup'=>$ort,
	]);
	}
	}
	if($text == "$key1" and joinchat($cid)=="true"){
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"📖 <b>Reklama berish uchun tugmani bosing!

🖇️ @$kanal kanaliga 1 ta post narxi: $reknarx $valyuta</b>",
	'parse_mode'=>"html",
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"✅ Tasdiqlash"]],
	[['text'=>"❌ Ortga qaytish"]],
	]]),
	]);
	}
if($text == "✅ Tasdiqlash" and joinchat($cid)=="true"){
	if($pul >= "$reknarx"){
		bot('DeleteMessage',[
	'chat_id'=>$chat_id,
	'message_id'=>$mid,
	]);
		bot('SendPhoto',[
		'chat_id'=>$chat_id,
		'photo'=>"https://t.me/AbduraxmonovUz/128",
		'caption'=>"💎 <b>Marxamat, reklamangiz matnini kiriting. Men uni kanalga joylayman!

⚠️ Faqatgina matn qabul qilinadi</b>",
		'parse_mode'=>"html",
		'reply_markup'=>$bekor,
		]);
		file_put_contents("step/$cid.step","rektayyor");
		}else{
			bot('DeleteMessage',[
	'chat_id'=>$chat_id,
	'message_id'=>$mid,
	]);
		bot('SendMessage',[
		'chat_id'=>$chat_id,
			'text'=>"🙁 <b>Kechirasiz, hisobingizda mablag' yetarli emas!</b>",
			'parse_mode'=>"html",
			'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"💸 Pul ishlash",'callback_data'=>"ishlash"]],
	]]),
	]);
			}
		}
if($step == "rektayyor"){
	if($text == "❌ Bekor qilish"){
        bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"🖥️ *Asosiy menyu*",
		'parse_mode'=>"markdown",
		'reply_markup'=>$menu,
		]);
		unlink("step/$cid.step");
		}else{
			bot('SendMessage',[
			'chat_id'=>$admin,
			'text'=>"<b><a href='tg://user?id=$cid'>$name</a>dan yangi reklama @$kanal ga joylandi</b>",
			'parse_mode'=>"html",
			]);
			bot('SendMessage',[
		'chat_id'=>"@FreeAdsUz",
		'text'=>"<b>#reklama

$text</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"💎 Tekin reklama",'url'=>"https://t.me/$botname"]],
	]]),
]);
	bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"💎 <b>Reklamangiz @$kanal ga joylandi</b>",
		'parse_mode'=>"html",
		'reply_markup'=>$menu,
		]);
		unlink("step/$cid.step");
		$a=$pul-$reknarx;
		file_put_contents("balans/$cid.txt",$a);
		}
		}
	
		/////Admin-Panel//////
		if($text == "⚙️ Boshqarish" or $text == "/panel"){
			if($chat_id == $admin){
			bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"👨‍💻<b> Boshqaruv paneli</b>",
		'parse_mode'=>"html",
		'reply_markup'=>$admpan,
		]);
		unlink("step/$cid.step");
		unlink("admin.db");
		}else{
			bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"👨‍💻<b> Ushbu bo'lim faqatgina men uchun!</b>",
		'parse_mode'=>"html",
		]);
		}
		}
		if($text == "🔊 Kanallarni sozlash"){
	if($cid == $admin){
	bot('SendMessage',[
	'chat_id'=>$admin,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
	[['text'=>"🔐 Majburiy obunalar",'callback_data'=>"majburiy"]],
	]
	])
	]);
	exit();
}
}

if($data == "majburiy"){	
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
'text'=>"<b>Majburiy obunalarni sozlash bo'limidasiz:</b>",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"➕ Qo'shish",'callback_data'=>"qoshish"]],
[['text'=>"📑 Ro'yxat",'callback_data'=>"royxat"],['text'=>"🗑 O'chirish",'callback_data'=>"ochirish"]],
[['text'=>"◀️ Orqaga",'callback_data'=>"kanallar"]]
]
])
]);
}

if($data == "qoshish"){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
	bot('SendMessage',[
	'chat_id'=>$cid2,
'text'=>"<i>Kanalingiz manzilini yuborishdan avval botni kanalingizga admin qilib olishingiz kerak!</i>

📢 <b>Kerakli kanalni manzilini yuboring:

Namuna:</b> <code>@FreeAdsUz</code>",
'parse_mode'=>'html',
'reply_markup'=>$admpan,
]);
file_put_contents("step/$cid2.step","qo'shish");
exit();
}
if($step == "qo'shish"){
if($cid == $admin){
if(isset($text)){		
if(mb_stripos($text, "@")!==false){
$get = bot('getChat',[
'chat_id'=>$text
]);
$types = $get->result->type;
$ch_name = $get->result->title;
$ch_user = $get->result->username;
if(getAdmin($ch_user)== true){
if($kanall == null){
file_put_contents("admin/kanal.txt",$text);
}else{
file_put_contents("admin/kanal.txt","\n".$text,FILE_APPEND);
}
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>$text qo'shildi.</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$admpan
]);
unlink("step/$cid.step");
exit();
}else{
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Bot ushbu kanalda admin emas!</b>

Qayta urinib ko'ring:",
'parse_mode'=>'html',
]);
exit();
}
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Kanal manzilini to'g'ri yuboring:</b>
Namuna: <code>@CyberCodeUz</code>",
'parse_mode'=>'html',
]);
exit();
}
}
}
}
if($data == "ochirish"){
	bot('deleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$mid2,
	]);
	bot('SendMessage',[
	'chat_id'=>$cid2,
'text'=>"<b>O'chirilishi kerak bo'lgan kanalning manzilini yuboring:

Namuna:</b> <code>@CyberCodeUz</code>",
'parse_mode'=>'html',
'reply_markup'=>$boshqarish,
]);
file_put_contents("step/$cid2.step","Kanal_o'chirish");
exit();
}
if($step == "Kanal_o'chirish"){
if($cid==$admin){
if(isset($text)){	
if(mb_stripos($text, "@")!==false){
if(mb_stripos($kanall, $text)!==false){
$soni = substr_count($kanall,"@");
if($soni != "1"){
$files = file_get_contents("admin/kanal.txt");
$file = str_replace("\n".$text."","",$files);
file_put_contents("admin/kanal.txt",$file);
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>$text o'chirildi.</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel
]);
unlink("step/$cid.step");
exit();
}else{
	bot('SendMessage',[
	'chat_id'=>$cid,
	'text'=>"<b>$text o'chirildi.</b>",
	'parse_mode'=>'html',
	'reply_markup'=>$panel
]);
unlink("step/$cid.step");
unlink("admin/kanal.txt");
exit();
}
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Ro'yxatdan topilmadi!</b>
Qayta urinib ko'ring:",
'parse_mode'=>'html',
]);
exit();
}
}else{
bot('SendMessage',[
'chat_id'=>$cid,
'text'=>"<b>Kanal manzilini to'g'ri yuboring:</b>
Namuna: <code>@CybercodeUz</code>",
'parse_mode'=>'html',
]);
exit();
}
}
}
}
if($data == "royxat"){
$soni = substr_count($kanall,"@");
if($kanall == null){
$text = "<b>Hech qanday kanallar ulanmagan!</b>";
}else{
$text = "<b>📢 Kanallar ro'yxati:</b>

$kanall

<b>Ulangan kanallar soni:</b> $soni ta";
}
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$mid2,
       'text'=>$text,
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Orqaga",'callback_data'=>"majburiy"]],
]
])
]);
}
		if($text=="📖 Pochta" and $chat_id == $admin){
			$lichka=file_get_contents("stat/azolar.txt");
			$lich=substr_count($lichka,"\n");
			bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"<b>$lich ta foydalanuvchiga yuboriladigan xabar matnini yuboring:</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⚙️ Boshqarish"]],
]])
]);
file_put_contents("admin.db","send");
}
if($adb == "send" and $chat_id==$admin){
	if($text == "⚙️ Boshqarish"){unlink("admin.db");}else{
	$lichka=file_get_contents("stat/azolar.txt");
$lich=substr_count($lichka,"\n");
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"<b>$lich ta foydalanuvchiga xabar yuborish boshlandi!</b>",
'parse_mode'=>"html",
'reply_markup'=>$admpan,
]);
$lich = file_get_contents("stat/azolar.txt");
$lichka = explode("\n",$lich);
foreach($lichka as $lichkalar){
$usr=bot("sendMessage",[
'chat_id'=>$lichkalar,
'text'=>$text,
'parse_mode'=>'HTML'
]);
unlink("admin.db");
}
}
if($usr){
$lichka=file_get_contents("stat/azolar.txt");
$lich=substr_count($lichka,"\n");
bot("sendmessage",[
'chat_id'=>$admin,
'text'=>"<b>$lich ta foydalanuvchiga muvaffaqiyatli yuborildi</b>",
'parse_mode'=>'html',
'reply_markup'=>$admpan,
]);
unlink("admin.db");
}
}
		if($text == "📚 Qo'llanma matni" and $chat_id == $admin){
			bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"<b>Matnni kiriting</b>",
		'parse_mode'=>"html",
		'reply_markup'=>$adm,
		]);
		file_put_contents("step/$cid.step","qtext");
		}
	 if($step == "qtext"){
		if($text == "⚙️ Boshqarish"){unlink("step/$cid.step");}else{
		bot('SendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"<b>Saved successfully!</b>",
		'parse_mode'=>"html",
			]);
			file_put_contents("admin/qollanma.txt",$text);
			unlink("step/$cid.step");
			}
			}

if(mb_stripos($data, "javob-")!==false and $cid2==$admin){
    $chat_id = explode("javob-",$data)[1];
    file_put_contents("admin.db",$chat_id);
    file_put_contents("step/$cid2.step",'javob');
    bot("sendMessage",[
        'text'=>"
<b>
📑 Javob matni ni kiriting.
</b>",
        'chat_id'=>$cid2,
        'parse_mode'=>'html'
    ]);
}
if($step=='javob' and $cid==$admin){
    unlink("step/$cid.step");
    $id = file_get_contents("admin.db");
    bot("sendMessage",[
        'text'=>"
<b>
✅ Xabar muvaffaqiyatli yuborildi.
</b>",
        'chat_id'=>$admin,
        'parse_mode'=>'html'
    ]);
    bot("sendMessage",[
        'text'=>"🤟 <b>Bot <a href='tg://user?id=$admin'>admini</a>dan javob:
———————————
📚 Matn: $text</b>",
        'chat_id'=>$id,
        'parse_mode'=>'html'
    ]);
}

if($text == "🔊 Rek narxi" and $cid==$admin){
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"🖇️ <i>Reklama narxini kiriting</i>",
	'parse_mode'=>"html",
	'reply_markup'=>$adm,
]);
file_put_contents("admin.db","reknarx");
}
if($adb == "reknarx" and $cid==$admin){
	if($text=="⚙️ Boshqarish"){unlink("admin.db");}else{
	if(is_numeric($text)=="true"){
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Reklama narxi $text $valyuta ga o'zgartirildi</b>",
	'parse_mode'=>"html",
	'reply_markup'=>$admpan,
	]);
	file_put_contents("admin/rekn.txt",$text);
	unlink("admin.db");
	}else{
		bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
	'parse_mode'=>"html",
	]);
	}
	}
	}
	
	if($text == "👥 Referal narxi" and $cid==$admin){
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"🖇️ <i>Refferal narxini kiriting</i>",
	'parse_mode'=>"html",
	'reply_markup'=>$adm,
]);
file_put_contents("admin.db","refnarx");
}

if($adb == "refnarx" and $cid==$admin){
	if($text=="⚙️ Boshqarish"){unlink("admin.db");}else{
	if(is_numeric($text)=="true"){
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Taklif narxi $text $valyuta ga o'zgartirildi</b>",
	'parse_mode'=>"html",
	'reply_markup'=>$admpan,
	]);
	file_put_contents("admin/ref.txt",$text);
	unlink("admin.db");
	}else{
		bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Faqat raqamlardan foydalaning!</b>",
	'parse_mode'=>"html",
	]);
	}
	}
	}
	if($text == "💱 Valyuta" and $cid==$admin){
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"🖇️ <i>Yangi valyutani kiriting</i>",
	'parse_mode'=>"html",
	'reply_markup'=>$adm,
]);
file_put_contents("admin.db","vall");
}

if($adb == "vall" and $cid==$admin){
	if($text=="⚙️ Boshqarish"){unlink("admin.db");}else{
	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Valyuta $text ga o'zgartirildi</b>",
	'parse_mode'=>"html",
	'reply_markup'=>$admpan,
	]);
	file_put_contents("admin/valyuta.txt",$text);
	unlink("admin.db");
	}
	}
	if($text == "📂 Bot kodi" and $cid == $admin){
    bot('sendDocument',[
    'chat_id'=>$admin,
    'document'=>new CURLFile(__FILE__),
    'caption'=>"<b>@$botname kodi</b>",
    'parse_mode'=>"html",
    'reply_markup'=>$admpan,
    ]);
}

	
	if($text == "📋 Userga Xabar"){
if($cid == $admin){
bot('sendMessage', [
'chat_id'=>$admin,
'text'=>"🔎 Userga xabar yuborish uchun quyidagi netma ketlikdan foydalaning.\n\n/sms 🆔️ Xabar matni",
'parse_mode'=>"html",
'reply_markup'=>$admpan,
]);
}else{
bot("sendmessage",[
'chat_id'=>$cid,
'text'=> "*⚠️ Bu funksiyani faqat men ishlata olaman.*",
'parse_mode'=>'Markdown',
]);
}
}
	if(mb_stripos($text,"/sms") !== false){
if($cid == $admin){
$ex = explode(" ",$text);
$sms = str_replace("/sms $ex[1]","",$text);
$ismi = $message->from->first_name;

if(mb_stripos($ex[1],"@") !== false){
$ssl = str_replace("@","",$ex[1]);
$egasi = "t.me/$ssl";
}else{
$egasi = "tg://user?id=$ex[1]";
$eegasi = "$ex[1]";
}
bot('sendmessage',[
'chat_id'=>$ex[1],
'text'=>"📨 *Admindan yangi xabar*

☎️ *Admin: @BuilderNet

📖 Xabar:$sms*",
'parse_mode'=>"markdown", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[[['text'=>"📨 Yordam",'callback_data'=>"sup"]]]]),
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"👤 <b><a href='tg://user?id=$ex[1]'>Foydalanuvchi</a>ga xabaringiz yuborildi.</b>",
'parse_mode'=>"html", 
'reply_markup'=>$adm,
]);
}else{
bot("sendmessage",[
'chat_id'=>$cid,
'text'=> "*⚠️ Bu funksiyani faqat men ishlata olaman.*",
'parse_mode'=>'Markdown',
]);
}
}
if($text == "🎛️ Tugmalar"){
	if($cid == $admin){
		bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>"html",
	'reply_markup'=>json_encode([
	'inline_keyboard'=>[
[['text'=>"🖥 Asosiy menyudagi tugmalar",'callback_data'=>"asosi"]],
[['text'=>"❌ O'z holiga qaytarish",'callback_data'=>"delbutton"]],
	]
]),
	]);
	}
	}
	
	if($data == "asosi"){	
     bot('editMessageText',[
        'chat_id'=>$cid2,
       'message_id'=>$message_id,
	'text'=>"<b>Quyidagilardan birini tanlang:</b>",
	'parse_mode'=>'html',
			'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$key1",'callback_data'=>"key1"]],
[['text'=>"$key2",'callback_data'=>"key2"],['text'=>"$key3",'callback_data'=>"key3"]],
/*[['text'=>"$key4",'callback_data'=>"key4"]],*/
[['text'=>"$key5",'callback_data'=>"key5"],['text'=>"$key6",'callback_data'=>"key6"]],
]
]),
]);
}
if($data == "key1"){
	file_put_contents("admin.db","key1");
	bot('DeleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$message_id,
	]);
	bot('sendMessage',[
        'chat_id'=>$cid2,
       'text'=>"🔎 <b>Tugma uchun yangi nom kiriting</b>",
       'parse_mode'=>"html",
       'reply_markup'=>$adm,
       ]);
       }
       if($adb == "key1"){
       	if($text=="⚙️ Boshqarish"){unlink("admin.db");}else{
       	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Tugma $text ga o'zgartirildi</b>",       
'parse_mode'=>"html",
]);
file_put_contents("tugma/key1.txt",$text);
unlink("admin.db");
}
}

if($data == "key2"){
	file_put_contents("admin.db","key2");
	bot('DeleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$message_id,
	]);
	bot('sendMessage',[
        'chat_id'=>$cid2,
       'text'=>"🔎 <b>Tugma uchun yangi nom kiriting</b>",
       'parse_mode'=>"html",
       'reply_markup'=>$adm,
       ]);
       }
       if($adb == "key2"){
       	if($text=="⚙️ Boshqarish"){unlink("admin.db");}else{
       	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Tugma $text ga o'zgartirildi</b>",       
'parse_mode'=>"html",
]);
file_put_contents("tugma/key2.txt",$text);
unlink("admin.db");
}
}

if($data == "key3"){
	file_put_contents("admin.db","key3");
	bot('DeleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$message_id,
	]);
	bot('sendMessage',[
        'chat_id'=>$cid2,
       'text'=>"🔎 <b>Tugma uchun yangi nom kiriting</b>",
       'parse_mode'=>"html",
       'reply_markup'=>$adm,
       ]);
       }
       if($adb == "key3"){
       	if($text=="⚙️ Boshqarish"){unlink("admin.db");}else{
       	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Tugma $text ga o'zgartirildi</b>",       
'parse_mode'=>"html",
]);
file_put_contents("tugma/key3.txt",$text);
unlink("admin.db");
}
}

if($data == "key4"){
	file_put_contents("admin.db","key4");
	bot('DeleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$message_id,
	]);
	bot('sendMessage',[
        'chat_id'=>$cid2,
       'text'=>"🔎 <b>Tugma uchun yangi nom kiriting</b>",
       'parse_mode'=>"html",
       'reply_markup'=>$adm,
       ]);
       }
       if($adb == "key4"){
       	if($text=="⚙️ Boshqarish"){unlink("admin.db");}else{
       	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Tugma $text ga o'zgartirildi</b>",       
'parse_mode'=>"html",
]);
file_put_contents("tugma/key4.txt",$text);
unlink("admin.db");
}
}

if($data == "key5"){
	file_put_contents("admin.db","key5");
	bot('DeleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$message_id,
	]);
	bot('sendMessage',[
        'chat_id'=>$cid2,
       'text'=>"🔎 <b>Tugma uchun yangi nom kiriting</b>",
       'parse_mode'=>"html",
       'reply_markup'=>$adm,
       ]);
       }
       if($adb == "key5"){
       	if($text=="⚙️ Boshqarish"){unlink("admin.db");}else{
       	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Tugma $text ga o'zgartirildi</b>",       
'parse_mode'=>"html",
]);
file_put_contents("tugma/key5.txt",$text);
unlink("admin.db");
}
}

if($data == "key6"){
	file_put_contents("admin.db","key6");
	bot('DeleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$message_id,
	]);
	bot('sendMessage',[
        'chat_id'=>$cid2,
       'text'=>"🔎 <b>Tugma uchun yangi nom kiriting</b>",
       'parse_mode'=>"html",
       'reply_markup'=>$adm,
       ]);
       }
       if($adb == "key6"){
       	if($text=="⚙️ Boshqarish"){unlink("admin.db");}else{
       	bot('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Tugma $text ga o'zgartirildi</b>",       
'parse_mode'=>"html",
]);
file_put_contents("tugma/key6.txt",$text);
unlink("admin.db");
}
}

if($data == "delbutton"){
	bot('DeleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$message_id,
	]);
	bot('sendMessage',[
        'chat_id'=>$cid2,
       'text'=>"<b>Barchasi o'z holiga qaytarilishini tasdiqlaysizmi?</b>",
       'parse_mode'=>"html",
       'reply_markup'=>json_encode([
       'inline_keyboard'=>[
[['text'=>"✅ Tasdiqlash",'callback_data'=>"deletb"]],
[['text'=>"❌ Bekor qilish",'callback_data'=>"asosiy"]],
	]
]),
       ]);
       }
       
       if($data == "deletb"){
       	bot('DeleteMessage',[
	'chat_id'=>$cid2,
	'message_id'=>$message_id,
	]);
	bot('sendMessage',[
        'chat_id'=>$cid2,
       'text'=>"✅ <b>Barchasi o'z holiga qaytarildi</b>",
       'parse_mode'=>"html",
       'reply_markup'=>$admpan,
       ]);
       deleteFolder("tugma");
       }
       
?>