<?php
$item_list = array(




    array("title" => "Xem nhiều", "input" => "https://truyen.tangthuvien.vn/tong-hop?rank=vw"),
    array("title" => "Đề cử", "input" => "https://truyen.tangthuvien.vn/tong-hop?rank=nm"),
    array("title" => "Bình luận nhiều", "input" => "https://truyen.tangthuvien.vn/tong-hop?rank=bl"),
    array("title" => "Theo dõi nhiều", "input" => "https://truyen.tangthuvien.vn/tong-hop?rank=td"),

    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg",
        "title" => "Tất cả",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=1",
        "title" => "Tiên Hiệp",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=2",
        "title" => "Huyền Huyễn",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=3",
        "title" => "Đô Thị",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=4",
        "title" => "Khoa Huyễn",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=5",
        "title" => "Kỳ Huyễn",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=6",
        "title" => "Võ Hiệp",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=7",
        "title" => "Lịch Sử",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=8",
        "title" => "Đồng Nhân",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=9",
        "title" => "Quân Sự",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=10",
        "title" => "Du Hí",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=11",
        "title" => "Cạnh Kỹ",

    ),
    array(
        "input" => "https://truyen.tangthuvien.vn/tong-hop?ctg=12",
        "title" => "Linh Dị",

    )

);


$json_response = array("data" => array("item_list" => $item_list));
header('Content-Type=>application/json');
echo json_encode($json_response);

?>