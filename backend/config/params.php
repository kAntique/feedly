<?php
return [
    'adminEmail' => 'admin@example.com',
    'res_openload' => 'http://localhost/feedly/backend/web/index.php?r=clip/clip/create',
    'url_openload_remote'=> 'https://api.openload.co/1/remotedl/add?login=7025d55ff5a790f1&key=yN-q0vUl&url=',
    //'key_api_openload'=>'kResascq',yN-q0vUl
    //'login_api_openload'=>'a187cd9d64e79ee4',7025d55ff5a790f1
    'url_openload_status'=>'https://api.openload.co/1/remotedl/status?login=7025d55ff5a790f1&key=yN-q0vUl&limit=5&id=',
    'url_openload_tiket'=>'https://api.openload.co/1/file/dlticket?file=',
    'login_openload'=>'&login=7025d55ff5a790f1&key=yN-q0vUl',
    'url_openload_link'=>'https://api.openload.co/1/file/dl?file=',//&ticket={ticket}
    'url_cat_clip'=>'http://localhost/feedly/backend/web/index.php?r=category%2Fcategory%2Fallcat_clip',
    'url_all_playlist'=>'http://localhost/feedly/backend/web/index.php?r=clip%2Fplaylist%2Fall_playlist&category_id=',
    'url_list_clip'=>'http://localhost/feedly/backend/web/index.php?r=clip%2Flistclip%2Flist_clip&playlist_id=',
    'url_play_clip'=>'http://localhost/feedly/backend/web/index.php?r=clip%2Fclip%2Fplay_clip&clip_id=',
];
