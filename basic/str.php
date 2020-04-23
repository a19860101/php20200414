<?php
    $s = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo animi ex, quae voluptatum ipsam officiis adipisci voluptate rerum consequuntur quaerat ea asperiores? Cumque totam quas id? Ut laudantium eum sint!";

    // echo strtoupper($s);
    // echo strtolower($s);
    // echo ucfirst($s);
    // echo ucwords($s);


    // $new_s = substr($s,0,50);
    // echo $new_s." 繼續閱讀...";

    $cs = "中華職棒在推特上的英文轉播吸引近500萬人觀看，前運動畫刊專欄作家傑菲（Jay Jaffe）因為看到胡金龍這個熟悉的名字而加入，但也指出一大挑戰，就是球員的英文名稱經過縮寫後難以辨識，還開了個諧音的玩笑說：「到底胡是誰（Hu is who）？」從大聯盟返台後效力富邦悍將隊的胡金龍，在18日對樂天桃猿敲出中職生涯第一千安，刷新聯盟最快紀錄，傑菲也記得胡金龍在效力道奇隊時，從撰寫過他的介紹文章，曾是百大新秀之一，在道奇隊可排第三，第一名是現役名投克蕭（Clayton Kershaw）。";

    // $new_cs = substr($cs,0,103);
    $new_cs = mb_substr($cs,0,10,"utf-8");
    // $new_cs = mb_substr($s,0,10,"utf-8");
    echo $new_cs;