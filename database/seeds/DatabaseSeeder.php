<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::dropIfExists('loai_sp');
        Schema::dropIfExists('san_pham');
        Schema::dropIfExists('bill_detail_ban');
        Schema::dropIfExists('bills_ban');
        Schema::dropIfExists('khach_hang');
        Schema::dropIfExists('users');
        Schema::dropIfExists('slide');
        Schema::create('san_pham', function ($table) {
            $table->increments('id')->unique()->unsigned();
            $table->string('name', 100)->nullable()->default(null);
            $table->integer('id_loai_sp')->unsigned()->nullable()->default(null);
            $table->text('mota_sp')->nullable()->default(null);
            $table->float('unit_price')->nullable()->default(null);
            $table->float('gia_km')->nullable()->default(null);
            $table->integer('so_luong');
            $table->string('image', 255)->nullable()->default(null);
            $table->string('don_vi_tinh', 255)->nullable()->default(null);
            $table->tinyInteger('new')->nullable()->default(0);
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);

        });
        Schema::create('khach_hang', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('ten_kh', 100)->nullable();;
            $table->string('email', 255)->nullable();;
            $table->string('dia_chi', 255)->nullable();;
            $table->string('sdt', 20)->nullable();;
            $table->string('note', 500)->nullable()->default(null);;
            $table->timestamp('created_at')->nullable()->default(Carbon::now());;
            $table->timestamp('updated_at')->nullable()->default(Carbon::now());;
            //$table->foreign('id')->references('id_kh')->on('bills_ban');
        });
        Schema::create('bills_ban', function ($table) {
            $table->increments('id')->unique()->unsigned();
            $table->integer('id_kh')->unique()->nullable()->default(null);
            $table->date('date_order')->nullable()->default(null);
            $table->float('tong_tien')->nullable()->default(null);
            $table->string('payment', 200)->nullable()->default(null);
            $table->string('Status', 20);
            $table->string('note', 500)->nullable()->default(null);
            $table->timestamp('created_at')->nullable()->default(Carbon::now());;
            $table->timestamp('updated_at')->nullable()->default(Carbon::now());
            $table->foreign('id_kh')->references('id')->on('khach_hang');

        });

        Schema::create('loai_sp', function ($table) {
            $table->integer('id')->unsigned();
            $table->string('tenloai', 100);
            $table->timestamp('created_at')->default(\Carbon\Carbon::now())->nullable();
            $table->timestamp('updated_at')->default(\Carbon\Carbon::now())->nullable();
            $table->foreign('id')->references('id')->on('san_pham');
        });

        Schema::create('bill_detail_ban', function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('id_bill_ban');
            $table->integer('id_sp');
            $table->integer('sl');
            $table->timestamp('created_at')->default(\Carbon\Carbon::now())->nullable();
            $table->timestamp('updated_at')->default(\Carbon\Carbon::now())->nullable();
            $table->foreign('id_bill_ban')->references('id')->on('bills_ban');
        });
        Schema::create('slide', function ($table) {
            $table->integer('id_slide')->unsigned();
            $table->string('link', 100);
            $table->text('image');

        });


        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('full_name', 50);
            $table->string('users_name', 50);
            $table->string('email', 255);
            $table->string('password', 250);
            $table->string('phone', 20);
            $table->string('address', 250);
            $table->text('image')->nullable()->default(null);
            $table->string('remember_token', 255)->nullable()->default(null);
            $table->integer('Delet')->default(0);
            $table->timestamp('created_at')->default(\Carbon\Carbon::now())->nullable();
            $table->timestamp('updated_at')->default(\Carbon\Carbon::now())->nullable();

        });


        DB::table('san_pham')->insert([
            ['id' => 1, 'name' => 'bơ', 'id_loai_sp' => 8, 'mota_sp' => 'Bơ (danh pháp hai phần: Persea americana) là một loại cây cận nhiệt đới có nguồn gốc từ México và Trung Mỹ, được phân loại thực vật có hoa, hai lá mầm, họ Lauraceae. Con người biết ăn trái cây bơ từ xưa, bằng chứng là người ta tìm thấy bình nước hình trái bơ tại đô thành Chan Chan trước thời đại Inca', 'unit_price' => 30000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'bo.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 2, 'name' => 'bưởi đào', 'id_loai_sp' => 8, 'mota_sp' => 'Bưởi Thanh Hồng là một giống bưởi đào được trồng phổ biến ở xã Thanh Hồng, huyện Thanh Hà, tỉnh Hải Dương. Đây là đối tượng cây trồng truyền thống, là nguồn gen đặc sản, có sức sống tốt, cho năng suất rất cao (có thể trên 1000 trái/cây/năm) mang lại giá trị cao ở địa phương này[1][2]. ', 'unit_price' => 35000, 'gia_km' => null, 'so_luong' => 49, 'image' => 'buoi_ngot.jpg', 'don_vi_tinh' => 'qua', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 3, 'name' => 'cam ngọt', 'id_loai_sp' => 8, 'mota_sp' => 'Cam (danh pháp hai phần: Citrus × sinensis) là loài cây ăn quả cùng họ với bưởi. Nó có quả nhỏ hơn quả bưởi, vỏ mỏng, khi chín thường có màu da cam, có vị ngọt hoặc hơi chua. Loài cam là một cây lai được trồng từ xưa, có thể lai giống giữa loài bưởi (Citrus maxima) và quýt (Citrus reticulata). Đây là cây nhỏ, cao đến khoảng 10 m, có cành gai và lá thường xanh dài khoảng 4-10 cm. Cam bắt nguồn từ Đông Nam Á, có thể từ Ấn Độ, Việt Nam hay miền nam Trung Quốc.[2]', 'unit_price' => 25000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'kOB2_cam_ngot.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 4, 'name' => 'dứa', 'id_loai_sp' => 8, 'mota_sp' => 'Dứa có các tên gọi khác như là : Khóm , Thơm (có nơi gọi là khớm) hay gai (miền Trung) hoặc trái huyền nương, tên khoa học Ananas comosus, là một loại quả nhiệt đới. Dứa là cây bản địa của Paraguay và miền nam Brasil[1].', 'unit_price' => 17000, 'gia_km' => null, 'so_luong' => 21, 'image' => 'dua.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 5, 'name' => 'dưa hấu', 'id_loai_sp' => 8, 'mota_sp' => 'Citrullus lanatus là một loài thực vật thuộc họ Cucurbitaceae, một loài thực vật có hoa giống như cây nho có nguồn gốc từ Tây Phi. Nó được trồng để lấy quả. Dưa này phân chia thành hai giống, dưa hấu (dưa hấu (Thunb.) Var. Lanatus) và Citrullus caffer (dưa hấu var. Citroides (LH Bailey) Mansf.) bắt nguồn từ việc đặt tên sai lầm của Citrullus lanatus (Thunb.) Matsum. & Nakai và Citrullus Vulgaris Schrad. bởi LH Bailey năm 1930.[1]', 'unit_price' => 35000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'dua_hau.jpg', 'don_vi_tinh' => 'quả', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 6, 'name' => 'đu đủ siêu ngọt', 'id_loai_sp' => 8, 'mota_sp' => 'Đu đủ (danh pháp khoa học: Carica papaya) là một cây thuộc họ Đu đủ. Đây là cây thân thảo to, không hoặc ít khi có nhánh, cao từ 3–10 m. Lá to hình chân vịt, cuống dài, đường kính 50–70 cm, có khoảng 7 khía. Hoa trắng hay xanh, đài nhỏ, vành to năm cánh. Quả đu đủ to tròn, dài, khi chín mềm, hạt màu nâu hoặc đen tùy từng loại giống, có nhiều hạt.', 'unit_price' => 30000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'img3.jpg', 'don_vi_tinh' => 'quả', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 7, 'name' => 'lê', 'id_loai_sp' => 8, 'mota_sp' => 'Lê là tên gọi chung của một nhóm thực vật, chứa các loài cây ăn quả thuộc chi có danh pháp khoa học Pyrus. Các loài lê được phân loại trong phân tông Pyrinae trong phạm vi tông Pyreae. Các loài cây này là cây lâu năm.', 'unit_price' => 26000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'le.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 8, 'name' => 'lựu', 'id_loai_sp' => 8, 'mota_sp' => 'Lựu hay còn gọi là thạch lựu (Danh pháp khoa học: Punica granatum) là một loài thực vật ăn quả thân gỗ nhỏ có chiều cao từ 5-8 mét. Lựu có nguồn gốc bản địa Tây Nam Á và được đem trồng tại vùng Kavkaz từ thời cổ đại. Nó được trồng rộng rãi tại Gruzia, Afghanistan, Algérie, Armenia, Azerbaijan, Iran, Iraq, Ấn Độ, Israel, Maroc, Pakistan, Syria, Thổ Nhĩ Kỳ, lục địa Đông Nam Á, Malaysia bán đảo, Đông Ấn, và châu Phi nhiệt đới.[', 'unit_price' => 35000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'luu.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 9, 'name' => 'mãng cầu xiêm đà lạt', 'id_loai_sp' => 8, 'mota_sp' => 'Mãng cầu Xiêm, còn gọi là mãng cầu gai, na Xiêm, na gai (danh pháp hai phần: Annona muricata) tùy theo vùng trồng, nó có thể có chiều cao từ 3 - 10m, rậm, lá màu đậm, không lông, xanh quanh năm. Hoa màu xanh, mọc ở thân. Quả mãng cầu xiêm to và có gai mềm. Thịt quả ngọt và hơi chua, hạt có màu nâu sậm.', 'unit_price' => 35000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'Mang-cau-Xiem-Da-Lat.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 10, 'name' => 'xoài ngọt', 'id_loai_sp' => 8, 'mota_sp' => 'Xoài là một loại trái cây vị ngọt thuộc chi Xoài, bao gồm rất nhiều quả cây nhiệt đới, được trồng chủ yếu như trái cây ăn được. Phần lớn các loài được tìm thấy trong tự nhiên là các loại xoài hoang dã. Tất cả đều thuộc họ thực vật có hoa Anacardiaceae.', 'unit_price' => 31000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'xoai tuoi.jpg', 'don_vi_tinh' => 'quả', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 11, 'name' => 'cải thảo', 'id_loai_sp' => 11, 'mota_sp' => 'Cải thảo còn được gọi là cải bao, cải cuốn, cải bắp tây (danh pháp ba phần: Brassica rapa subsp. pekinensis), là phân loài thực vật thuộc họ Cải ăn được có nguồn gốc từ Trung Quốc, được sử dụng rộng rãi trong các món ăn ở Đông Nam Á và Đông Á. Loài thực vật này trồng nhiều ở Trung Quốc, Hàn Quốc, Nhật Bản, Việt Nam... nhưng cũng có thể bắt gặp ở Bắc Mỹ, châu Âu, Úc, New Zealand.', 'unit_price' => 15000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'cai_thao_da_lat.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 12, 'name' => 'xà lách', 'id_loai_sp' => 11, 'mota_sp' => 'Xà lách[2] hay còn gọi cải bèo[2], cải tai bèo[3] (danh pháp khoa học: Lactuca sativa) là loài thực vật có hoa thuộc họ Cúc được nhà thực vật L. mô tả khoa học lần đầu năm 1753.[1] Nó thường được trồng làm rau ăn lá đặc biệt trong món xa lát, bánh mì kẹp, hăm-bơ-gơ và nhiều món ăn khác.', 'unit_price' => 8000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'xa lach lolo xanh.jpg', 'don_vi_tinh' => 'bó', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 13, 'name' => 'nấm kim', 'id_loai_sp' => 11, 'mota_sp' => 'Nấm kim châm là một loài nấm màu trắng được sử dụng trong ẩm thực các nước châu Á như Nhật Bản, Trung Hoa, bán đảo Triều Tiên. Đây là giống trồng của Flammulina velutipes. Dạng cây mọc hoang có màu khác. Nấm có hình giá đậu nhưng với kích thước lớn. Mũ nấm lúc còn non có hình câu hay hình bán cầu, về sau chuyển sang dạng ô. Mũ nấm có màu vàng ở giữa có màu vàng thẫm hơn. Cuống có màu trắng hay vàng nhạt, nửa dưới có màu nâu nhạt.', 'unit_price' => 30000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'namkim.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 14, 'name' => 'nấm ngô', 'id_loai_sp' => 11, 'mota_sp' => 'nấm ngô', 'unit_price' => 15000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'nam_ngo.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 15, 'name' => 'nấm sò', 'id_loai_sp' => 11, 'mota_sp' => 'Nấm sò hay Nấm bào ngư (danh pháp hai phần: Pleurotus ostreatus) là một loài nấm ăn được thuộc họ Pleurotaceae. Nó được trồng lần đầu ở Đức để ăn trong thế chiến 1[1] nhưng mãi cho đến năm 1970, nấm bào ngư mới được nuôi trồng đại trà khắp thế giới, tuy nhiên việc trồng được ghi chép trong tài liệu đầu tiên là bởi Kaufert[2]. ', 'unit_price' => 10000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'nam-so-navisa.jpg', 'don_vi_tinh' => 'bó', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 16, 'name' => 'nấm rơm', 'id_loai_sp' => 11, 'mota_sp' => 'Nấm rơm hay nấm mũ rơm (danh pháp hai phần: Volvariella volvacea) là một loài nấm trong họ nấm lớn sinh trưởng và phát triển từ các loại rơm rạ. Nấm gồm nhiều loài khác nhau, có đặc điểm hình dạng khác nhau như có loại màu xám trắng, xám, xám đen… kích thước đường kính "cây nấm" lớn, nhỏ tùy thuộc từng loại.[2] Là loại nấm giàu dinh dưỡng. Nấm rơm chứa nhiều vitamin A, B1, B2, PP, D, E, C và chứa bảy loại a-xít amin. Nấm rơm phổ biến tại các làng quê vì thường được sử dụng làm thực phẩm.', 'unit_price' => 7000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'nam_rom.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 17, 'name' => 'súp lơ trắng', 'id_loai_sp' => 11, 'mota_sp' => 'Bông cải trắng hay còn gọi là súp lơ, hay su lơ, bắp su lơ, hoa lơ (tiếng Pháp: Chou-fleur), cải hoa hay cải bông trắng là một loại cải ăn được, thuộc loài Brassica oleracea, họ Cải, mọc quanh năm, gieo giống bằng hạt. Phần sử dụng làm thực phẩm của súp lơ là toàn bộ phần hoa chưa nở, phần này rất mềm, xốp nên không chịu được mưa nắng. Phần lá và thân thường chỉ được sử dụng làm thức ăn cho gia súc', 'unit_price' => 20000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'suplotrang1.jpg', 'don_vi_tinh' => 'bó', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 18, 'name' => 'nấm tươi chân dài', 'id_loai_sp' => 11, 'mota_sp' => 'nấm tươi chân dài', 'unit_price' => 10000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'nam-tuoi-chan-dai-navisa.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 19, 'name' => 'rau ngót', 'id_loai_sp' => 11, 'mota_sp' => 'Rau ngót, bù ngót, bồ ngót, hay rau tuốt (danh pháp hai phần: Sauropus androgynus) là một loài cây bụi mọc hoang ở vùng nhiệt đới Á châu nhưng cũng được trồng làm một loại rau ăn ở một số nước, như ở Việt Nam.[4][5]', 'unit_price' => 11000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'raungot_20.jpeg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],
            ['id' => 20, 'name' => 'cần tây', 'id_loai_sp' => 11, 'mota_sp' => 'Cần tây, danh pháp khoa học Apium graveolens, là một loài thực vật thuộc họ Hoa tán. Loài này được Carl von Linné mô tả khoa học đầu tiên năm 1753.[2', 'unit_price' => 8000, 'gia_km' => null, 'so_luong' => 24, 'image' => 'can_tay.jpg', 'don_vi_tinh' => 'kg', 'created_at' => null, 'updated_at' => '2019-05-08 07:25:19'],

        ]);
        DB::table('loai_sp')->insert([
           ['id'=>8, 'tenloai'=>'Hoa quả','created_at'=>null,'updated_at'=>now()],
           ['id'=>11, 'tenloai'=>'Rau xanh','created_at'=>null,'updated_at'=>now()]
        ]);
        //DB::table('users')->insert([
        //        'id'=>0, 'full_name'=>'chị thủy', 'users_name'=>'thuyng27b', 'email'=>'tuy27ng@gmail.com', 'password'=>'$2y$10$ZqXTXQc27apgq83tWucqOuFoVpzgbAZSnXCDfHEv7licxbmuLvfhu', 'phone'=>'0355455283', 'address'=>'A3', 'image'=>'', 'remember_token'=>null, 'Delet'=>0, 'created_at'=>now(), 'updated_at'=>now()
         //   ]);

    }
}
