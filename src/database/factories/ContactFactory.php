<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ja_JP');
        $category = Category::inRandomOrder()->first();

        $detailsByCategory = [
            1 => [
                '商品がまだ届いていません。注文番号を確認していただけますか。',
                '配送日時の変更は可能でしょうか。',
                '配送状況を確認したいです。',
                '届け先の住所を変更したいのですが、可能でしょうか。',
                '注文した商品はいつ届きますか。',
            ],
            2 => [
                '届いた商品のサイズが合わないので交換をお願いしたいです。',
                '商品の色を交換したいのですが、可能ですか。',
                '交換の手続き方法を教えてください。',
                '交換にかかる日数を教えてください。',
                '交換の送料はどちらが負担しますか。',
            ],
            3 => [
                '届いた商品に傷がありました。交換をお願いしたいです。',
                '商品が破損していました。対応をお願いします。',
                '注文した商品と違うものが届きました。',
                '商品が動作しません。不良品でしょうか。',
                '部品が欠品していました。確認をお願いします。',
            ],
            4 => [
                '商品の在庫状況を教えてください。',
                '新商品の入荷予定はありますか。',
                '店舗の営業時間を教えてください。',
                '会員登録の方法を教えてください。',
                'ポイントの使い方を教えてください。',
            ],
            5 => [
                '領収書の発行をお願いしたいです。',
                '注文をキャンセルしたいのですが、手続き方法を教えてください。',
                '返品方法を教えてください。',
                'パスワードを忘れてしまいました。',
                'メールマガジンの配信を停止したいです。',
            ],
        ];

        $details = $detailsByCategory[$category->id];

        return [
            'last_name' => $faker->lastName(),
            'first_name' => $faker->firstName(),
            'gender' => $faker->numberBetween(1, 3),
            'email' => $faker->unique()->safeEmail(),
            'tel' => $faker->numerify('0##########'),
            'address' => $faker->prefecture() . $faker->city() . $faker->streetAddress(),
            'building' => $faker->secondaryAddress(),
            'category_id' => $category->id,
            'detail' => $faker->randomElement($details),
        ];
    }
}
