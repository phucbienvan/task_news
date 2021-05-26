<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'name' => 'Malaysia đối mặt khủng hoảng Covid-19 nặng nề nhất Đông Nam Á',
            'category_id' => 1,
            'desc' => 'Đoạn video quay cảnh 5 nhân viên y tế mặc đồ bảo hộ màu trắng cố gắng hồi sức cho một bệnh nhân Covid-19 đang được điều trị tại trung tâm cách ly bên ngoài thủ đô Kuala Lumpur, Malaysia, nhưng thất bại, đã gây sự chú ý đặc biệt.',
            'contents' => 'Cuối tuần trước, giới chức Malaysia đã siết chặt biện pháp phòng dịch nhưng chưa tính đến chuyện phong tỏa vì các ngành công nghiệp vẫn cần hoạt động.',
            'image' => 'malai.jpg',
            'status' => 0,
            'views' => 0,
            'created_at' => new DateTime()
        ]);
    }
}
