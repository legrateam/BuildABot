<?php
/**
 * Created by @OnyxTM.
 * User: Morteza Bagher Telegram id : @mench
 * GitHub Url: https://github.com/onyxtm
 * Channel : @phpbots , @ch_jockdoni , @ch_pm , @onyxtm
 * Date: 11/12/2016
 * Time: 09:19 PM
 */

$update = json_decode(file_get_contents('php://input'));
$json = file_get_contents('php://input');
$txt = $update->message->text;
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$channel_forward = $update->channel_post->forward_from;
$channel_text = $update->channel_post->text;
$from = $update->message->from->id;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$msgid = $update->callback_query->message->message_id;

$free = "free";
$to = file_get_contents("mail.txt");

$token = file_get_contents("token.txt");//yes
$fileddd = json_decode(file_get_contents("https://api.telegram.org/bot$token/getMe"));
$id = $fileddd->result->id;
define("**TOKEN**",$token);

$roke = json_decode(file_get_contents("https://api.telegram.com/bot$token/getMe"));
$usernameeeeee = $roke->result->username;

$cchat_id = $update->callback_query->message->chat->id;
$cdata = $update->callback_query->data;

$chtext = $update->channel_post->text;
$inline = file_get_contents("inline.txt");

$time = file_get_contents("http://api.bridge-ads.ir/td?td=time");
$date = file_get_contents("http://api.bridge-ads.ir/td?td=date");

$prof = file_get_contents("prof.txt");

$admins = file_get_contents("admin.txt");//yes
$admin = explode(",",$admins);

$boole = file_get_contents("bool.txt");//yes
$bool = explode("#-!",$boole);

$channel = file_get_contents("channel.txt");//yes
$start = file_get_contents("start.txt"); //yes

function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}

$user = file_get_contents('Member.txt');
$members = explode("\n", $user);
if (!in_array($chat_id, $members)) {
    $add_user = file_get_contents('Member.txt');
    $add_user .= $chat_id . "\n";
    file_put_contents('Member.txt', $add_user);
}

function step($step){
    file_put_contents("step.txt",$step);
}
function bridge($method, $datas=[]){
    $url = "https://api.telegram.org/bot".TOKEN."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function bridge2($token,$method, $datas=[]){
    $url = "https://api.telegram.org/bot".$token."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}


$st = file_get_contents("step.txt");
$step = explode("\n",$st);

$lc = file_get_contents("channel2.txt");



$mi = file_get_contents("http://api.bridge-ads.ir/td/more.php?td=i");
$mh = file_get_contents("http://api.bridge-ads.ir/td/more.php?td=h");
$ms = file_get_contents("http://api.bridge-ads.ir/td/more.php?td=s");
$ml = file_get_contents("http://api.bridge-ads.ir/td/more.php?td=l");
$mj = file_get_contents("http://api.bridge-ads.ir/td/more.php?td=j");
$mf = file_get_contents("http://api.bridge-ads.ir/td/more.php?td=F");
$my = file_get_contents("http://api.bridge-ads.ir/td/more.php?td=Y");

$reply = $update->message->reply_to_message;
$firstname = $update->message->chat->first_name;
$lastname = $update->message->chat->last_name;

$test = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$lc&user_id=$chat_id"));
//$newtoken = json_decode(file_get_contents("https://api.telegram.org/bot$txt/getMe"));
$newbot = json_decode(file_get_contents("https://binaam.000webhostapp.com/bot/countbot/api.php?token=$txt&admin=$chat_id&start=$start"));
if($test->result->status != "left" || in_array($chat_id,$admin) || $lc == "NULL" || $lc == "") {
    if (preg_match('/^\/([Ss]tart)/', $txt)) {
        if (!is_dir("words")) {
            mkdir("words");
        } else if(!is_dir("Admin")){
            mkdir("words");
        }
        $x = $start;
        if (contains("FRNAME", $x)) {
            $x = str_replace("FRNAME", $firstname, $x);
        }
        if (contains("CHID", $x)) {
            $x = str_replace("CHID", $chat_id, $x);
        }
        if (contains("LSNAME", $x)) {
            $x = str_replace("LSNAME", $lastname, $x);
        }
        if (contains("TIME", $x)) {
            $x = str_replace("TIME", $time, $x);
        }
        if (contains("DATE", $x)) {
            $x = str_replace("DATE", $date, $x);
        }
        if (contains("MIN", $x)) {
            $x = str_replace("MIN", $mi, $x);
        }
        if (contains("HOUR", $x)) {
            $x = str_replace("HOUR", $mh, $x);
        }
        if (contains("SEC", $x)) {
            $x = str_replace("SEC", $ms, $x);
        }
        if (contains("DAY", $x)) {
            $x = str_replace("DAY", $ml, $x);
        }
        if (contains("MON", $x)) {
            $x = str_replace("MON", $mf, $x);
        }
        if (contains("YEAR", $x)) {
            $x = str_replace("YEAR", $my, $x);
        }
        if (in_array($chat_id,$admin)) {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => $x,
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'مدیریت']]
                ], 'resize_keyboard' => true
                ])
            ]);
            bridge("forwardmessage", [
                'chat_id' => $chat_id,
                'from_chat_id' => "@phpbots",
                'message_id' => 58
            ]);
        } else {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => $x,
                'parse_mode' => "HTML",
                'reply_markup' => json_encode(['force_reply' => true,
                    'selective' => true
                ])
            ]);
            bridge("forwardmessage", [
                'chat_id' => $chat_id,
                'from_chat_id' => "@phpbots",
                'message_id' => 58
            ]);
        }
    } else if (preg_match('/^\/([Cc]reator)/', $txt)) {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "این ربات توسط @countmsgbot تهیه و ساخته شده
            نسخه ۱.۵",
            'parse_mode' => "HTML"
        ]);
    } else if ($txt == "مدیریت" || $txt == "/manage" && in_array($chat_id,$admin)) {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "به بخش مدیریت خوش آمدید :",
            'reply_markup' => json_encode(['keyboard' => [
                [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                ['قفل ربات🔒', "بروز کردن ربات😉"],
                ["پاسخ سریع😁","افزودن مدیر ✅"],
                ["⌨بازگشت به منوی اصلی⌨"]
            ], 'resize_keyboard' => true
            ])
        ]);
    } else if ($newbot->ok == true) {
        $newusername = $newbot->result->username;
        if ($newbot->result->tag == "new") {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "ربات شما ساخته شد 👇🏻
@$newusername
برای مدیریت خود به ربات رفته و دستور /start را ارسال کنید برای ورود به بخش مدیریت /manage را ارسال کنید😉"
            ]);
        } else if ($newbot->result->tag == "update") {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "ربات شما بروز شد 👇🏻
@$newusername
برای مدیریت خود به ربات رفته و دستور /start را ارسال کنید برای ورود به بخش مدیریت /manage را ارسال کنید😉"
            ]);
        }
    } elseif ($txt == "قفل ربات🔒" && in_array($chat_id,$admin) && $step[0] == "NULL") {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "
            آیدی کانالتان را ارسال کنید ربات باید ادمین کانال باشد
                    برای لغو عملیات دستور /cancell را ارسال کنید",
            'reply_markup' => json_encode(['keyboard' => [
                [['text' => 'برداشتن قفل'], ['text' => 'لغو عملیات']]
            ], 'resize_keyboard' => true])
        ]);
        file_put_contents("step.txt", "CHANNEL-LOCK");
    } elseif ($step[0] == "CHANNEL-LOCK" && in_array($chat_id,$admin)) {
        if ($txt == "لغو عملیات" || $txt == "/cancell" && in_array($chat_id,$admin)) {
            file_put_contents("step.txt", "NULL");
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "عملیات لغو شد.",
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                    [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                    ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                    ['قفل ربات🔒', "بروز کردن ربات😉"],
                    ["پاسخ سریع😁","افزودن مدیر ✅"],
                    ["⌨بازگشت به منوی اصلی⌨"]
                ], 'resize_keyboard' => true
                ])
            ]);
        } elseif ($txt == "برداشتن قفل" && in_array($chat_id,$admin)) {
            file_put_contents("channel2.txt", "NULL");
            file_put_contents("step.txt", "NULL");
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "قفل حذف شد.",
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                    [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                    ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                    ['قفل ربات🔒', "بروز کردن ربات😉"],
                    ["پاسخ سریع😁","افزودن مدیر ✅"],
                    ["⌨بازگشت به منوی اصلی⌨"]
                ], 'resize_keyboard' => true
                ])
            ]);
            $subject = "قفل ربات";
            $txt = "قفل ربات حذف شد.";
            $headers = "From: countbot@phpbots.tk" . "\r\n" .
                "CC: countbot@phpbots.tk";


            mail($to,$subject,$txt,$headers);
        } else {
            $ch = json_decode(file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$txt&text=@ch_jockdoni++++++++++++تایید+کانال"));
            if ($ch->ok == true) {
                $subject = "قفل ربات";
                $txt = "قفل ربات به $txt تغییر کرد";
                $headers = "From: countbot@phpbots.tk" . "\r\n" .
                    "CC: countbot@phpbots.tk";


                mail($to,$subject,$txt,$headers);
                file_put_contents("step.txt", "NULL");
                bridge("sendMessage", [
                    'chat_id' => $chat_id,
                    'text' => "آیدی کانال ثبت شد.
        $txt",
                    'reply_markup' => json_encode(['keyboard' => [
                        [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                        [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                        ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                        ['قفل ربات🔒', "بروز کردن ربات😉"],
                        ["پاسخ سریع😁","افزودن مدیر ✅"],
                        ["⌨بازگشت به منوی اصلی⌨"]
                    ], 'resize_keyboard' => true
                    ])
                ]);
                file_put_contents("channel2.txt", "$txt");
            } else {
                bridge("sendMessage", [
                    'chat_id' => $chat_id,
                    'text' => "آیدی کانال صحیح نمیباشد",
                    'reply_markup' => json_encode(['keyboard' => [
                        [['text' => 'برداشتن قفل'], ['text' => 'لغو عملیات']]
                    ], 'resize_keyboard' => true])
                ]);
            }
        }
    } else if ($txt == "⌨بازگشت به منوی اصلی⌨" && in_array($chat_id,$admin)) {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "شما از پنل مدیریت خارج شدید",
            'reply_markup' => json_encode(['keyboard' => [
                array("مدیریت")
            ], 'resize_keyboard' => true
            ])
        ]);
    } else if ($chtext == "/id") {
        $chids = $update->channel_post->chat->id;
        bridge("sendMessage", [
            'chat_id' => $chids,
            'text' => "آیدی کانال شما :
        " . $chids
        ]);
    } else if ($txt == "/id") {
        $fid = $update->message->chat->id;
        bridge("sendMessage", [
            'chat_id' => $fid,
            'text' => "آیدی کانال شما :
        " . $fid
        ]);
    } else if ($txt == "تنظیم آیدی کانال" || $txt == "آیدی کانال🔶" && $step[0] == "NULL" && in_array($chat_id,$admin)) {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "
    آیدی کانال را همراه با @ وارد نمایید.
     میتوانید آیدی عددی کانال را نیز ارسال کنید برای دریافت آن میتوانید به کانالتان بروید و دستور /id را ارسال کنید.
        برای لغو عملیات دستور /cancell را ارسال کنید",
            'reply_markup' => json_encode(['keyboard' => [
                [['text' => 'لغو عملیات']]
            ], 'resize_keyboard' => true])
        ]);
        file_put_contents("step.txt", "CHANNEL");
    } elseif ($step[0] == "CHANNEL" && in_array($chat_id,$admin)) {
        if ($txt == "لغو عملیات" || $txt == "/cancell" && in_array($chat_id,$admin)) {
            file_put_contents("step.txt", "NULL");
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "عملیات لغو شد.",
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                    [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                    ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                    ['قفل ربات🔒', "بروز کردن ربات😉"],
                    ["پاسخ سریع😁","افزودن مدیر ✅"],
                    ["⌨بازگشت به منوی اصلی⌨"]
                ], 'resize_keyboard' => true
                ])
            ]);
        } else {
            $ch = json_decode(file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$txt&text=تایید+کانال+@ch_jockdoni"));
            if ($ch->ok == true) {
                file_put_contents("step.txt", "NULL");
                bridge("sendMessage", [
                    'chat_id' => $chat_id,
                    'text' => "آیدی کانال ثبت شد.
        $txt",
                    'reply_markup' => json_encode(['keyboard' => [
                        [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                        [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                        ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                        ['قفل ربات🔒', "بروز کردن ربات😉"],
                        ["پاسخ سریع😁","افزودن مدیر ✅"],
                        ["⌨بازگشت به منوی اصلی⌨"]
                    ], 'resize_keyboard' => true
                    ])
                ]);
                file_put_contents("channel.txt", "$txt");
            } else {
                bridge("sendMessage", [
                    'chat_id' => $chat_id,
                    'text' => "کانال ثبت نشد دلایل :
                1 . ممکن است ربات ادمین کانال نباشد
                2.ممکن است کانالی با این آیدی وجود نداشته باشد
   
   میتوانید آیدی عددی کانال را نیز ارسال کنید برای دریافت آن میتوانید به کانالتان بروید و دستور /id را ارسال کنید.
        برای لغو عملیات دستور /cancell را ارسال کنید",
                    'reply_markup' => json_encode(['keyboard' => [
                        [['text' => 'لغو عملیات']]
                    ], 'resize_keyboard' => true])
                ]);
            }
        }
    } else if ($txt == "تغییر متن شروع" || $txt == "متن استارت🔶" && $step[0] == "NULL" && in_array($chat_id,$admin)) {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "متن شروع جدید را ارسال کنید مقادیر :
MIN -> دقیقه
HOUR -> ساعت
SEC -> ثانیه
DAY -> نام روز(مثلا سه شنبه(
MON -> ماه
YEAR -> سال
TIME -> زمان کلی
DATE -> تاریخ کلی
FRNAME -> نام کاربر
LSNAME -> فامیلی کاربر
CHID -> آیدی عددی کاربر

برای لغو عملیات دستور /cancell را ارسال کنید",
            'reply_markup' => json_encode(['keyboard' => [
                [['text' => 'لغو عملیات']]
            ], 'resize_keyboard' => true])
        ]);
        file_put_contents("step.txt", "START");
    } elseif ($step[0] == "START" && in_array($chat_id,$admin)) {
        if ($txt == "لغو عملیات" || $txt == "/cancell" && in_array($chat_id,$admin)) {
            file_put_contents("step.txt", "NULL");
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "عملیات لغو شد.",
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                    [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                    ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                    ['قفل ربات🔒', "بروز کردن ربات😉"],
                    ["پاسخ سریع😁","افزودن مدیر ✅"],
                    ["⌨بازگشت به منوی اصلی⌨"]
                ], 'resize_keyboard' => true])
            ]);
        } else {
            $subject = "تنظیم متن شروع";
            $txt = "متن شروع به \r\n $txt \r\n تغییر یافت";
            $headers = "From: countbot@phpbots.tk" . "\r\n" .
                "CC: countbot@phpbots.tk";


            mail($to,$subject,$txt,$headers);

            file_put_contents("step.txt", "NULL");
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "متن شروع ثبت شد.
        $txt",
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                    [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                    ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                    ['قفل ربات🔒', "بروز کردن ربات😉"],
                    ["پاسخ سریع😁","افزودن مدیر ✅"],
                    ["⌨بازگشت به منوی اصلی⌨"]
                ], 'resize_keyboard' => true
                ])
            ]);
            file_put_contents("start.txt", "$txt");
        }
    } elseif ($txt == "لغو عملیات" || $txt == "/cancell" && in_array($chat_id,$admin)) {
        file_put_contents("step.txt", "NULL");
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "عملیات لغو شد.",
            'reply_markup' => json_encode(['keyboard' => [
                [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                ['قفل ربات🔒', "بروز کردن ربات😉"],
                ["پاسخ سریع😁","افزودن مدیر ✅"],
                ["⌨بازگشت به منوی اصلی⌨"]
            ], 'resize_keyboard' => true
            ])
        ]);
    } else if ($txt == "/help" || $txt == 'راهنما⚠️' || $txt == "راهنما" && in_array($chat_id,$admin)) {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "به راهنمای ربات خوش آمدید😉

برای تنظیم آیدی کانال ، آیدی کانال خود را همراه با @ بعد از دستور /setchannel قرار دهید.
برای مثال :
```  @ch_jockdoni ```
➖➖➖➖➖➖
تنظیم متن بنر در حالت اینلاین ربات متن شما پس از دستور😉
``` /sit #TEXT ```
sit مخفف set inline text میباشد فرمت شما میتواند html باشد
قبلش از طریق @botfather ست اینلاین کنید
➖➖➖➖➖➖
برای تنظیم متن شروع ، متن را پس از دستور /setstart قرار دهید
برای مثال:
 سلام به ربات سین ساز خوش اومدی😉
میتوانید از مقادیر زیر برای نمایش پروفایل کاربر استفاده کنید
MIN -> دقیقه
HOUR -> ساعت
SEC -> ثانیه
DAY -> نام روز(مثلا سه شنبه(
MON -> ماه
YEAR -> سال
TIME -> زمان کلی
DATE -> تاریخ کلی
FRNAME -> نام کاربر
LSNAME -> فامیلی کاربر
CHID -> آیدی عددی کاربر
➖➖➖➖➖➖
برای ارسال پیام به همه اعضا میتوانید از دستور /sendtoall استفاده نمایید (متن پیام بعد از دستور) برای مثال :
``` /sendtoall ```
```سلام به همه دوستان همین حالا عضو کانال ما شوید```
``` @ch_jockdoni ```
➖➖➖➖➖➖
برای دریافت آمار ربات دستور /state را ارسال کنید. 😉
➖➖➖➖➖➖
فرمت متن HTML میباشد.😊
➖➖➖➖➖➖
برای استفاده از بخش دکمه ها از دکمه زیر استفاده کن یا دستور /manage را ارسال کنید",
            'parse_mode' => "Markdown"
        ]);
    } else if (preg_match('/^\/([Ss]it)/', $txt) && in_array($chat_id,$admin)) {
        $sit = str_replace("/sit", "", $txt);
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "پیامتان برای حالت اینلاین ثبت شد:
        $sit"
        ]);

        file_put_contents("inline.txt", $sit);

    } else if (preg_match('/^\/([Ss]endtoall)/', $txt) && in_array($chat_id,$admin)) {
        $strh = str_replace("/sendtoall", "", $txt);
        $ttxtt = file_get_contents('Member.txt');
        $x = $strh;
        if (contains("FRNAME", $x)) {
            $x = str_replace("FRNAME", $firstname, $x);
        }
        if (contains("CHID", $x)) {
            $x = str_replace("CHID", $chat_id, $x);
        }
        if (contains("LSNAME", $x)) {
            $x = str_replace("LSNAME", $lastname, $x);
        }
        $membersidd = explode("\n", $ttxtt);
        for ($y = 0; $y < count($membersidd); $y++) {
            bridge("sendMessage", [
                'chat_id' => $membersidd[$y],
                "text" => $x,
                "parse_mode" => "HTML"
            ]);
        }
        $memcout = count($membersidd) - 1;
        bridge("sendMessage", [
            'chat_id' => $admin,
            "text" => " پیام شما به $memcount   نفر ارسال شد😉",
            "parse_mode" => "HTML"
        ]);
    } else if (preg_match('/^\/([Ss]etstart)/', $txt) && in_array($chat_id,$admin)) {
        $setsta = str_replace("/setstart", "", $txt);
        $y = $setsta;
        if (contains("FRNAME", $y)) {
            $x = str_replace("FRNAME", $firstname, $y);
        }
        if (contains("CHID", $y)) {
            $x = str_replace("CHID", $chat_id, $y);
        }
        if (contains("LSNAME", $y)) {
            $x = str_replace("LSNAME", $lastname, $y);
        }
        file_put_contents("start.txt", "$y");

        bridge("sendMessage", [
            'chat_id' => $admin,
            "text" => "متن شروع به 
        $y
        تغییر یافت",
            "parse_mode" => "HTML"
        ]);
    } else if (preg_match('/^\/([Ss]etchannel)/', $txt) && in_array($chat_id,$admin)) {
        $setch = str_replace("/setchannel", "", $txt);

        file_put_contents("channel.txt", "$setch");

        bridge("sendMessage", [
            'chat_id' => $admin,
            "text" => "آیدی کانال به 
        $setch
        تغییر یافت",
            "parse_mode" => "HTML"
        ]);
    } else if (preg_match('/^\/([Ss]tate)/', $txt) || $txt == "آمار" || $txt == "📊آمار کاربران" && in_array($chat_id,$admin)) {
        $user = file_get_contents('Member.txt');
        $member_id = explode("\n", $user);
        $member_count = count($member_id) - 1;
        bridge('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "👥 تعداد کاربران جدید ربات شما : $member_count",
            'parse_mode' => 'HTML'
        ]);

        $subject = "آمار ربات";
        $txt = "👥 تعداد کاربران جدید ربات شما : $member_count";
        $headers = "From: countbot@phpbots.tk" . "\r\n" .
            "CC: countbot@phpbots.tk";


        mail($to,$subject,$txt,$headers);
    } else if(preg_match('/^\/([Pp]hoto)/',$txt) and $reply){
        if($reply->sticker){
            $file = $reply->sticker->file_id;
            $get = bridge('getfile',[
                'file_id'=>$file
            ]);
            $patch = $get->result->file_path;
            file_put_contents('Admin/Sticker.png',file_get_contents('https://api.telegram.org/file/bot'.$token.'/'.$patch));
            bridge("sendPhoto",[
                'chat_id'=>$chat_id ,
                'photo'=>"https://binaam.000webhostapp.com/bot/countbot/bot/$id/Admin/Sticker.png"
            ]);
        }
    }else if(preg_match('/^\/([Ss]ticker)/',$txt) and $reply){
        if($reply->photo){
            $photo = $reply->photo;
            $file = $photo[count($photo)-1]->file_id;
            $get = bridge('getfile',['file_id'=>$file]);
            $patch = $get->result->file_path;
            file_put_contents('Admin/Photo-S.png',file_get_contents('https://api.telegram.org/file/bot'.$token.'/'.$patch));
            bridge("sendSticker",[
                'chat_id'=>$chat_id ,
                "sticker"=> "https://binaam.000webhostapp.com/bot/countbot/bot/$id/Admin/Photo-S.png" ,
            ]);
        }
    }else if(preg_match('/^\/([aA]udio)/',$txt) and $reply){
        if($reply->video){
            $video = $reply->video;
            $file = $video->file_id;
            $get = bridge('getfile',['file_id'=>$file]);
            $patch = $get->result->file_path;
            file_put_contents('Admin/audio.ogg',file_get_contents('https://api.telegram.org/file/bot'.$token.'/'.$patch));
            bridge("sendAudio",[
                'chat_id'=>$chat_id ,
                "audio"=>"https://binaam.000webhostapp.com/bot/countbot/bot/$id/Admin/audio.ogg" ,
                'title'=>"@ch_jockdoni",
                'performer'=>"کانال جوکدونی . کانال خنده و شادی"
            ]);
        }
    } else if ($txt == "فوروارد همگانی😉" && $step[0] == "NULL" && in_array($chat_id,$admin)) {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "پیام خود را فوروارد کنید یا ارسال نمایید
برای لغو عملیات دستور /cancell را ارسال کنید",
            'reply_markup' => json_encode(['keyboard' => [
                [['text' => 'لغو عملیات']]
            ], 'resize_keyboard' => true])
        ]);
        file_put_contents("step.txt", "FORTOALL");

    } elseif ($step[0] == "FORTOALL" && in_array($chat_id,$admin)) {
        file_put_contents("step.txt", "NULL");
        $ttxttt = file_get_contents('Member.txt');
        $membersiddt = explode("\n", $ttxttt);

        for ($yt = 0; $yt < count($membersiddt); $yt++) {
            bridge("forwardmessage", [
                'chat_id' => $membersiddt[$yt],
                'from_chat_id' => $chat_id,
                'message_id' => $update->message->message_id
            ]);
        }

        $memcoutt = count($membersiddt) - 1;
        bridge("sendMessage", [
            'chat_id' => $admin,
            "text" => "پیام شما به $memcoutt نفر فوروارد شد.",
            "parse_mode" => "HTML",
            'reply_markup' => json_encode(['keyboard' => [
                [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                ['قفل ربات🔒', "بروز کردن ربات😉"],
                ["پاسخ سریع😁","افزودن مدیر ✅"],
                ["⌨بازگشت به منوی اصلی⌨"]
            ], 'resize_keyboard' => true
            ])
        ]);

        file_put_contents("start.txt", "$txt");
        //پیام همگانی ⌨
    } elseif ($txt == "پیام همگانی ⌨" && in_array($chat_id,$admin) && $step[0] == "NULL") {
        file_put_contents("step.txt", "BC");
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "پیام متنی خود را ارسال کنید
برای لغو عملیات دستور /cancell را ارسال کنید",
            'reply_markup' => json_encode(['keyboard' => [
                [['text' => 'لغو عملیات']]
            ], 'resize_keyboard' => true])
        ]);
    } elseif ($step[0] == "BC" && in_array($chat_id,$admin)) {
        if (isset($update->message->text)) {
            file_put_contents("step.txt", "NULL");
            $ttxtt = file_get_contents('Member.txt');
            $x = $txt;
            if (contains("FRNAME", $x)) {
                $x = str_replace("FRNAME", $firstname, $x);
            }
            if (contains("CHID", $x)) {
                $x = str_replace("CHID", $chat_id, $x);
            }
            if (contains("LSNAME", $x)) {
                $x = str_replace("LSNAME", $lastname, $x);
            }
            $membersidd = explode("\n", $ttxtt);
            for ($y = 0; $y < count($membersidd); $y++) {
                bridge("sendMessage", [
                    'chat_id' => $membersidd[$y],
                    "text" => $x,
                    "parse_mode" => "HTML"
                ]);
            }
            $memcout = count($membersidd) - 1;
            bridge("sendMessage", [
                'chat_id' => $admin,
                "text" => "پیام شما به $memcout نفر ارسال شد.",
                "parse_mode" => "HTML",
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                    [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                    ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                    ['قفل ربات🔒', "بروز کردن ربات😉"],
                    ["پاسخ سریع😁","افزودن مدیر ✅"],
                    ["⌨بازگشت به منوی اصلی⌨"]
                ], 'resize_keyboard' => true
                ])
            ]);
            $subject = "پیام همگانی";
            $txt = "پیام :\r\n$txt\r\nارسال شده به $memcout نفر";
            $headers = "From: countbot@phpbots.tk" . "\r\n" .
                "CC: countbot@phpbots.tk";


            mail($to,$subject,$txt,$headers);
        } else {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "پیام شما متن نمیباشد
برای لغو عملیات دستور /cancell را ارسال کنید",
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'لغو عملیات']]
                ], 'resize_keyboard' => true])
            ]);
        }
    } elseif ($txt == "افزودن مدیر ✅" && in_array($chat_id,$admin) && $step[0] == "NULL") {
        file_put_contents("step.txt", "NEWADMIN");
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "یک متن از مدیر جدید برای من فوروارد کنید",
            'reply_markup' => json_encode(['keyboard' => [
                [['text' => 'لغو عملیات']]
            ], 'resize_keyboard' => true])
        ]);
    } elseif ($step[0] == "NEWADMIN" && in_array($chat_id,$admin)) {
        if (isset($update->message->forward_from)) {
            $idna = $update->message->forward_from->id;
            file_put_contents("step.txt", "NULL");
            file_put_contents("admin.txt", "$admins,$idna");
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                "text" => "ادمین افزوده شد",
                "parse_mode" => "HTML",
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                    [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                    ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                    ['قفل ربات🔒', "بروز کردن ربات😉"],
                    ["پاسخ سریع😁","افزودن مدیر ✅"],
                    ["⌨بازگشت به منوی اصلی⌨"]
                ], 'resize_keyboard' => true
                ])
            ]);

        }elseif ($txt == "لغو عملیات") {
            file_put_contents("step.txt", "NULL");
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                "text" => "عملیات لغو شد",
                "parse_mode" => "HTML",
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                    [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                    ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                    ['قفل ربات🔒', "بروز کردن ربات😉"],
                    ["پاسخ سریع😁","افزودن مدیر ✅"],
                    ["⌨بازگشت به منوی اصلی⌨"]
                ], 'resize_keyboard' => true
                ])
            ]);

        } else {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "پیامی را از شخصی فوروارد کنید",
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'لغو عملیات']]
                ], 'resize_keyboard' => true])
            ]);
        }
    } else if ($txt == "بروز کردن ربات😉") {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "آیا شما مایل به بروزرسانی ربات هستید؟🤔",
            'reply_markup' => json_encode(['inline_keyboard' => [
                [['text' => 'بله', 'callback_data' => 'update'], ['text' => 'خیر', 'callback_data' => 'notup']]
            ]])
        ]);
    } else if ($cdata == "update") {
        bridge("editMessageText", [
            'chat_id' => $cchat_id,
            'text' => "رباتتان بروز شد اکنون دستور /start را بفرستید",
            'message_id' => $update->callback_query->message->message_id
        ]);
        $upbot = file_get_contents("https://binaam.000webhostapp.com/bot/countbot/bot.txt");
        file_put_contents("index.php", $upbot);
    } else if ($cdata == "notup") {
        bridge("editMessageText", [
            'chat_id' => $cchat_id,
            'text' => "عملیات بروز رسانی لغو شد",
            'message_id' => $update->callback_query->message->message_id
        ]);
    } else if ($txt == "پاسخ سریع😁" && in_array($chat_id,$admin)) {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "یکی از دکمه های زیر را انتخاب کنید",
            'reply_markup' => json_encode([
                'keyboard' => [
                    ['افزودن', 'حذف'],
                    ['⌨بازگشت به منوی اصلی⌨']
                ], 'resize_keyboard' => true
            ])
        ]);
    } elseif ($txt == "افزودن" && $step[0] == "NULL" && in_array($chat_id,$admin)) {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "متن پاسخ سریع را ارسال کنید.
        مثلا : سلام",
            'reply_markup' => json_encode(['keyboard' => [
                ['لغو عملیات']
            ],
                'resize_keyboard' => true
            ])
        ]);
        file_put_contents("step.txt", "SETWORD");
    } elseif ($step[0] == "SETWORD" && in_array($chat_id,$admin)) {
        if ($txt == "لغو عملیات") {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "عملیات لغو گردید.
            از دکمه های زیر برای پاسخ سریع استفاده کنید",
                'reply_markup' => json_encode(['keyboard' => [
                    ['افزودن', 'حذف'],
                    ['⌨بازگشت به منوی اصلی⌨']
                ],
                    'resize_keyboard' => true
                ])
            ]);
            file_put_contents("step.txt", "NULL");
        } else {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "حالا پاسخ را ارسال کن.
        مثلا : سلام برشما",
                'reply_markup' => json_encode(['keyboard' => [
                    ['لغو عملیات']
                ],
                    'resize_keyboard' => true
                ])
            ]);
            file_get_contents("words/$txt.txt");
            file_put_contents("last.txt", "$txt");
            file_put_contents("step.txt", "SETWORD2");
        }
    } elseif ($step[0] == "SETWORD2" && in_array($chat_id,$admin)) {
        if ($txt == "لغو عملیات") {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "عملیات لغو گردید.
            از دکمه های زیر برای پاسخ سریع استفاده کنید",
                'reply_markup' => json_encode(['keyboard' => [
                    ['افزودن', 'حذف'],
                    ['⌨بازگشت به منوی اصلی⌨']
                ],
                    'resize_keyboard' => true
                ])
            ]);
            file_put_contents("step.txt", "NULL");
        } else {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "پاسخ سریع ثبت شد",
                'reply_markup' => json_encode(['keyboard' => [
                    ['افزودن', 'حذف'],
                    ['⌨بازگشت به منوی اصلی⌨']
                ],
                    'resize_keyboard' => true
                ])
            ]);
            $ass = file_get_contents("last.txt");
            file_put_contents("words/$ass.txt", $txt);
            file_put_contents("step.txt", "NULL");
        }
    }elseif ($txt == "حذف" && $step[0] == "NULL" && in_array($chat_id,$admin)) {
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => "متن مورد نطر را برای حذف بفرست.
        مثلا : سلام",
            'reply_markup' => json_encode(['keyboard' => [
                ['لغو عملیات']
            ],
                'resize_keyboard' => true
            ])
        ]);
        file_put_contents("step.txt", "DELWORD");
    } else if ($step[0] == "DELWORD" && in_array($chat_id,$admin)) {
        $aaaaa = unlink("words/$txt.txt");
        if ($aaaaa == true) {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "حذف شد
            ",
                'reply_markup' => json_encode(['keyboard' => [
                    ['افزودن', 'حذف'],
                    ['⌨بازگشت به منوی اصلی⌨']
                ],
                    'resize_keyboard' => true
                ])
            ]);
            file_put_contents("step.txt", "NULL");
        } elseif ($txt == "لغو عملیات") {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "پاسخ سریع ثبت شد",
                'reply_markup' => json_encode(['keyboard' => [
                    ['افزودن', 'حذف'],
                    ['⌨بازگشت به منوی اصلی⌨']
                ],
                    'resize_keyboard' => true
                ])
            ]);
            file_put_contents("step.txt", "NULL");
        } else {
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => "دوباره سعی کنید",
                'reply_markup' => json_encode(['keyboard' => [
                    ['لغو عملیات']
                ],
                    'resize_keyboard' => true
                ])
            ]);
        }
    }else if(preg_match('/^\/([Mm]ail)/',$txt) && in_array($chat_id,$admin)){
        $mail = str_replace("/mail","",$txt);
        file_put_contents("mail.txt",$mail);
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' =>"ایمیل خبررسانی ثبت شد.
            $mail"
        ]);
        $subject = "ثبت موفق ایمیل";
        $txt = "ربات شما با موفقیت به ایمیلتان متصل شد.";
        $headers = "From: info@phpbots.tk" . "\r\n" .
            "CC: info@phpbots.tk";


        mail($to,$subject,$txt,$headers);
    } elseif (file_exists("words/$txt.txt")) {
        $file = file_get_contents("words/$txt.txt");

        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' =>$file
        ]);

    }else if($txt == "ثبت دکمه متن شروع" && in_array($chat_id,$admin) && $step[0] == "NULL"){
        bridge("sendMessage", [
            'chat_id' => $chat_id,
            'text' => 'درود بر شما برای افزودن دکمه از فرمت زیر استفاده کنید:
 1 دکمه شیشه در یک ردیف
[["text"=>"متن دکمه","url"=>"لینک شما"]]
2 دکمه شیشه ای در 1 ردیف
[["text"=>"متن دکمه1","url"=>"1لینک دکمه"],["text"=>"متن دکمه2","url"=>"2لینک دکمه"]]
2 دکمه در 2 ردیف
[["text"=>"متن دکمه1","url"=>"1لینک دکمه"]],[["text"=>"متن دکمه2","url"=>"2لینک دکمه"]]

دکمه ها با , از جدا مشوند 😉',
            'reply_markup' => json_encode(['keyboard' => [
                ['لغو عملیات']
            ],
                'resize_keyboard' => true
            ])
        ]);
        file_put_contents("step.txt","SETBTN");
    }else if ($step[0] == "SETBTN" && in_array($chat_id,$admin)){
        $btn = json_encode([
            'inline_keyboard'=>[
                $txt
            ]]);
//        $okk = bridge("sendMessage",[
//            'chat_id'=>$chat_id,
//            'text'=>"دکمه ها به صورت زیر نمایش داده میشوند",
//            'reply_markup'=>$btn
//        ])->ok;
        $okk = json_decode(file_get_contents("https://api.telegram.org/bot".TOKEN."/sendMessage?chat_id=$chat_id&text=test&reply_markup=$btn"));

        if($okk->ok == true){
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => 'دکمه ها ثبت شدند',
                'reply_markup' => json_encode(['keyboard' => [
                    ['لغو عملیات']
                ],
                    'resize_keyboard' => true
                ])
            ]);
            file_put_contents("btn.txt","$txt");
            file_put_contents("step.txt","NULL");
        }elseif($txt == "لغو عملیات" && in_array($chat_id,$admin)){
            bridge("sendMessage", [
                'chat_id' => $admin,
                "text" => "عملیات لغو شد",
                "parse_mode" => "HTML",
                'reply_markup' => json_encode(['keyboard' => [
                    [['text' => 'متن استارت🔶'], ['text' => "آیدی کانال🔶"]],
                    [['text' => 'راهنما⚠️'], ['text' => "📊آمار کاربران"]],
                    ['فوروارد همگانی😉', "پیام همگانی ⌨"],
                    ['قفل ربات🔒', "بروز کردن ربات😉"],
                    ["پاسخ سریع😁","افزودن مدیر ✅"],
                    ["⌨بازگشت به منوی اصلی⌨"]
                ], 'resize_keyboard' => true
                ])
            ]);
            
            file_put_contents("step.txt","NULL");
        }else{
            bridge("sendMessage", [
                'chat_id' => $chat_id,
                'text' => 'فرمت اشتباه دوباره سعی کنید.',
                'reply_markup' => json_encode(['keyboard' => [
                    ['لغو عملیات']
                ],
                    'resize_keyboard' => true
                ])
            ]);
        }
    } else {
        $to_channel = bridge("forwardMessage", [
            'chat_id' => $channel,
            'from_chat_id' => $chat_id,
            'message_id' => $message_id
        ])->result->message_id;

        bridge("forwardMessage", [
            'chat_id' => $chat_id,
            'from_chat_id' => $channel,
            'message_id' => $to_channel
        ]);

//        bridge("forwardMessage", [
//            'chat_id' => $chat_id,
//            'from_chat_id' => "@ch_jockdoni",
//            'message_id' => "791"
//        ]);
    }
}else {
    bridge("sendMessage", [
        'chat_id' => $chat_id,
        'text' => "ابتدا در کانال زیر عضو شده و سپس به ربات بازگشته و دستور /start را ارسال کنید😉
$lc"
    ]);
}

// - end Code -


//inline Query
$messages = array(
    'https://binaam.000webhostapp.com/bot/countbot/bannerphoto1.png',
    'https://binaam.000webhostapp.com/bot/countbot/bannerphoto2.png',
    'https://binaam.000webhostapp.com/bot/countbot/bannerphoto3.png'
);

bridge('answerInlineQuery', [
    'inline_query_id' => $update->inline_query->id,
    'results' => json_encode([[
        'type' => 'article',
        'thumb_url'=>$messages[rand(0, count($messages) - 1)],
        'id' => base64_encode(rand(5,555)),
        'title' => 'کلیک کنید',
        'description'=>"$inline",
        'input_message_content' => ['parse_mode' => 'HTML', 'message_text' => "$inline"],
        'reply_markup' => [
            'inline_keyboard' => [
                [
                    ['text' => "اشتراک", 'switch_inline_query' => ""]
                ]
            ]
        ]

    ]])
]);
