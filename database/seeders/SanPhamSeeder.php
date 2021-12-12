<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\SanPham;
use App\Models\Donhang;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $category = \App\Models\Category::all();
        SanPham::create(
            [
                'name' => 'Tủ sấy quần áo',
                'amount' => (rand(10,1000)),
                'Price' => (rand(10000,100000)),
                'description' => 'Kích thước: 75*50*147cm.
                ️ Công suất: 1000w.
                ️ Nhiệt độ sấy: 60-70 độ.
                ️ Khối lượng sấy: 15kg.
                ️ Tính năng hẹn giờ: 0-180 phút.',
                'img_link' => ('https://quanlybanhangapi.herokuapp.com/public/products/1.png'),
            ],
        )->categories()->attach($category->where('id',1)->first());
        SanPham::create(
            [
                'name' => 'Nồi chiên không dầu',
                'amount' => (rand(10,1000)),
                'Price' => (rand(10000,100000)),
                'description' => 'NỒI CHIÊN KHÔNG DẦU ĐA NĂNG
                Nồi chiên tích hợp lò sấy và nướng đa năng
                Dung tích 14 lít.
                Thiết kế vô cùng bắt mắt cùng màu xanh coban sang trọng và hiện đại
                Công suất mạnh mẽ 1700w, hoạt động gia nhiệt trên, gia nhiệt dưới cùng quạt đối lưu sẽ giúp chín đều thực phẩm, không cần lật thực phẩm trong quá trình nấu nướng
                Có 16 chức năng để lựa chọn, dễ dàng làm vô số món ăn và món bánh,...bằng NCKD thông minh này
                Màn hình cảm ứng điện tử hiện đại, nắp kính sang trọng giúp dễ dàng quan sát thực phẩm bên trong',
                'img_link' => ('https://quanlybanhangapi.herokuapp.com/public/products/2.png'),
            ],
        )->categories()->attach([1]);
        SanPham::create(
            [
                'name' => 'Bếp lẩu nướng đa năng',
                'amount' => (rand(10,1000)),
                'Price' => (rand(10000,100000)),
                'description' => '- Tên sản phẩm: Bếp Nướng Điện, Nồi Lẩu Điện, nồi lẩu nướng, nồi lẩu đa năng
                - Điện áp: 220V ~ 50Hz
                - Công suất: 2700
                - Nhiệt độ: 0 - 230 độ C
                - Chất liệu bộ phát nhiệt:Inox 304
                - Phương thức điều khiển: Nút vặn
                - Chất liệu: Vỏ chống dính an toàn
                -Loại sản phẩm: bếp lẩu liền không tách rời',
                'img_link' => ('https://quanlybanhangapi.herokuapp.com/public/products/3.png'),
            ],
        )->categories()->attach([1]);
        SanPham::create(
            [
                'name' => 'Đầu Lọc Nước Tại Vòi',
                'amount' => (rand(10,1000)),
                'Price' => (rand(10000,100000)),
                'description' => 'Lắp vừa mọi loại đầu ống
                Bộ lọc nước tại vòi hiện đại tiêu chuẩn
                Bộ lọc nước tại vòi hiện đại được làm từ chất liệu INOX siêu bền và thiết kế lõi lọc Sứ cao cấp, sáng bóng, bền đẹp và sang trọng.- Sản phẩm có thiết kế nhỏ gọn, dễ dàng lắp đặt, tương thích với hầu hết các loại vòi nước. Dụng cụ có thể lọc các độc tố gây bệnh như asen, amoni, các kim loại nặng, đóng cặ và khử sạch mùi nước sinh hoạt. có thể lọc các độc tố gây bệnh như asen, amoni, các kim loại nặng, đóng cặ và khử sạch mùi nước sinh hoạt.',
                'img_link' => ('https://quanlybanhangapi.herokuapp.com/public/products/4.png'),
            ],
        )->categories()->attach([1]);
        SanPham::create(
            [
                'name' => 'Robot tự đổ rác hút bụi lau nhà',
                'amount' => (rand(10,1000)),
                'Price' => (rand(10000,100000)),
                'description' => 'Robot hút bụi lau nhà tự đổ rác Neabot N1 Plus hàng chính hãng 2021',
                'img_link' => ('https://quanlybanhangapi.herokuapp.com/public/products/5.png'),
            ],
        )->categories()->attach([1,2]);
        SanPham::create(
            [
                'name' => 'Bộ cáp sạc nhanh đa năng',
                'amount' => (rand(10,1000)),
                'Price' => (rand(10000,100000)),
                'description' => 'Tất cả cáp sạc, đầu sạc, chọc sim, khay đựng sim, giá đỡ điện thoại... đều có mặt trong RC-190

                Cáp sạc nhanh đủ bộ 3 đầu phù hợp với hầu hết các thiết bị thông minh hiện nay

                Tốc độ sạc lên đến 60W

                Công nghệ tự động nhận dạng thiết bị và điều chỉnh công suất, điện áp và dòng điện phù hợp với từng loại thiết bị',
                'img_link' => ('https://quanlybanhangapi.herokuapp.com/public/products/6.png'),
            ],
        )->categories()->attach([2]);
        SanPham::create(
            [
                'name' => 'Loa siêu trầm',
                'amount' => (rand(10,1000)),
                'Price' => (rand(10000,100000)),
                'description' => 'Công suất vượt trội và mở rộng tần số thấp xuống sâu đến 16 Hz với biên độ chính xác và có kiểm soát. Trang bị củ loa SVS 12 inch hoàn toàn mới, bộ khuếch đại Sledge 550 Watts RMS, công suất cực đại 1.500+ Watts với đầu ra MOSFET hoàn toàn tách biệt và ứng dụng điện thoại thông minh SVS subwoofer DSP. Được tối ưu hóa với thiết kế thùng loa họng thông hơi kép để loa đạt được mức âm trầm với độ méo tiếng thấp',
                'img_link' => ('https://quanlybanhangapi.herokuapp.com/public/products/7.png'),
            ],
        )->categories()->attach([2]);
        SanPham::create(
            [
                'name' => 'Chả ram tôm đất',
                'amount' => (rand(10,1000)),
                'Price' => (rand(10000,100000)),
                'description' => 'Với sản phẩm tươi sống, trọng lượng thực tế có thể chênh lệch khoảng 10%.',
                'img_link' => ('https://quanlybanhangapi.herokuapp.com/public/products/8.png'),
            ],
        )->categories()->attach([3]);
        SanPham::create(
            [
                'name' => 'Trứng cá ngừ đại dương',
                'amount' => (rand(10,1000)),
                'Price' => (rand(10000,100000)),
                'description' => 'Trứng cá ngừ đại dương là thực phẩm hải sản sung dinh dưỡng tốt nhất cho người gầy, người già yếu đặc biệt là cho trẻ em.',
                'img_link' => ('https://quanlybanhangapi.herokuapp.com/public/products/9.png'),
            ],
        )->categories()->attach([3]);
        SanPham::create(
            [
                'name' => 'Bánh Danisa',
                'amount' => (rand(10,1000)),
                'Price' => (rand(10000,100000)),
                'description' => 'tra mạng là có',
                'img_link' => ('https://quanlybanhangapi.herokuapp.com/public/products/10.png'),
            ],
        )->categories()->attach([3]);
    }
}
