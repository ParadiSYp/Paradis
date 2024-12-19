<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;

class UpdatedMenuTableSeeder extends Seeder
{
    public function run(): void
    {
        $dishes = [
            'soups' => [
                ['name' => 'Луковый суп', 'price' => 599, 'description' => 'Состав: лук, масло, чеснок, бульон, сухое белое вино, тимьян, перец. соль.', 'image' => 'onion_soup.jpg'],
                ['name' => 'Буйабес', 'price' => 799, 'description' => 'Состав: помидоры, лук, чеснок, фенхель, апельсиновую или лимонную цедру, шафран, пряности', 'image' => 'bouillabaisse.jpg'],
                ['name' => 'Кассуле', 'price' => 499, 'description' => 'Состав: свиные колбаски, белая фасоль, бекон, лук, морковь, чеснок, красное вино.', 'image' => 'cassoulet.jpg'],
                ['name' => 'Консоме', 'price' => 999, 'description' => 'Состав: курица, лук репчатый, морковь, стебель сельдерея, чеснок, петрушка, тархун, лавровый лист', 'image' => 'consume.jpg'],
                ['name' => 'Вишисуаз', 'price' => 799, 'description' => 'Состав: лук-порей, картофель, бульон овощной и сливки.', 'image' => 'vichy_french.jpg'],
            ],
            'main_courses' => [
                ['name' => 'Цыпленок', 'price' => 599, 'description' => 'Состав: цыпленок, красное вино, лук, чеснок, грибы, бекон или копчености, морковь, травы.', 'image' => 'cock.jpg'],
                ['name' => 'Рататуй', 'price' => 799, 'description' => 'Состав: баклажаны, цукини, перец, помидоры, лук, чеснок, оливковое масло, травы.', 'image' => 'ratatouille.jpg'],
                ['name' => 'Потофе', 'price' => 499, 'description' => 'Состав: картофель, масло или оливковое масло, соль и перец, травы.', 'image' => 'Pot-au-feu.jpg'],
                ['name' => 'Алиго', 'price' => 999, 'description' => 'Состав: картофель, сыр (традиционно тартар или монт-дор), сливки или молоко, чеснок, соль и перец.', 'image' => 'aligot.jpg'],
                ['name' => 'Тимбаль', 'price' => 799, 'description' => 'Состав: рис или картофель, овощи, мясо, яйца, сливки или соус.   ', 'image' => 'timbal.jpg'],
                ['name' => 'Котлета де воля', 'price' => 799, 'description' => 'Состав: котлета из телятины, соль и перец, масло или сливочное масло для жарки, чеснок и травы.', 'image' => 'cutlet_de_volyai.jpg'],
                ['name' => 'Шукрут', 'price' => 599, 'description' => 'Состав: квашеная капуста, свинина , кар тофель, лук, белое вино или бульон, специи (перец, тмин).', 'image' => 'shukrut.jpg'],
                ['name' => 'Утиное конфи', 'price' => 799, 'description' => 'Состав: утиные ножки, соль, чеснок, травы (тимьян, лавровый лист), утиный жир.', 'image' => 'duck_confit.jpg'],
            ],
            'snacks' => [
                ['name' => 'Салат Нисуаз', 'price' => 599, 'description' => 'Состав: тунец, помидоры, зеленая фасоль, картофель, яйца, оливки, красный лук, оливковое масло, уксус.', 'image' => 'salade.jpg'],
                ['name' => 'Галантин', 'price' => 799, 'description' => 'Состав:мясо, фарш, специи, желатин, овощи, бульон.', 'image' => 'galantine.jpg'],
                ['name' => 'Террин', 'price' => 499, 'description' => 'Состав: свинина, печень, овощи, специи, яйца для связывания', 'image' => 'terrine.jpg'],
                ['name' => 'Андуйет', 'price' => 999, 'description' => 'Состав: свинина, свиные внутренности, специи (перец, чеснок), вино, свиная оболочка.  ', 'image' => 'andouillette.jpg'],
            ],
            'delicacies' => [
                ['name' => 'Трюфели', 'price' => 599, 'description' => 'Состав: подземные грибы.', 'image' => 'truffle.jpg'],
                ['name' => 'Фуа-гра', 'price' => 799, 'description' => 'Состав: фуа-гра подается в виде паштета или террина, часто с добавлением специй, коньяка или сладких соусов.', 'image' => 'foie.jpg'],
                ['name' => 'Устрицы', 'price' => 499, 'description' => 'Состав: морские моллюски, которые обычно подаются сырыми на льду с лимоном.', 'image' => 'oysters.jpg'],
                ['name' => 'Улитки', 'price' => 999, 'description' => 'Состав: улитки, чеснок, петрушка и сливочное масло.', 'image' => 'snails.jpg'],
                ['name' => 'Лапки лягушки', 'price' => 799, 'description' => 'Состав: мясо лапок лягушек, которое обжаривается с чесноком и петрушкой. ', 'image' => 'paws.jpg'],
                ['name' => 'Каштаны', 'price' => 799, 'description' => 'Состав: съедобные плоды каштанового дерева, которые запечены.', 'image' => 'chestnuts.jpg'],
            ],
            'baking' => [
                ['name' => 'Киш', 'price' => 599, 'description' => 'Состав: есто (мука, масло, вода, соль), яйца, сливки, сыр, начинка (овощи, мясо).', 'image' => 'quiche.jpg'],
                ['name' => 'Тартифлет', 'price' => 799, 'description' => 'Состав: картофель, бекон, лук, сыр reblochon, сливки, перец.', 'image' => 'tartiflette.jpg'],
                ['name' => 'Писсаладьер', 'price' => 499, 'description' => 'Состав: тесто (мука, масло), лук, анчоусы, оливки, яйца.', 'image' => 'pissaladiere.jpg'],
            ],
            'desserts' => [
                ['name' => 'Клафути', 'price' => 599, 'description' => 'Состав: вишня (или другие фрукты), яйца, молоко, сахар, мука, ваниль.', 'image' => 'clafoutis.jpg'],
                ['name' => 'Профитроли', 'price' => 799, 'description' => 'Состав: тесто (мука, масло, яйца, вода), крем патисьер, шоколадный соус.', 'image' => 'profiteroles.jpg'],
                ['name' => 'Крем-брюле', 'price' => 499, 'description' => 'Состав: сливки, яйца, сахар, ваниль.', 'image' => 'creme.jpg'],
                ['name' => 'Крепы', 'price' => 999, 'description' => 'Состав: мука, яйца, молоко, соль.', 'image' => 'crepes.jpg'],
            ]
        ];

        foreach ($dishes as $name => $category) {
            foreach ($category as $dish) {
                $dish['created_at'] = now();
                $dish['updated_at'] = now();
                Dish::create($dish);
            }
        }

        \Log::info('UpdatedMenuTableSeeder finished successfully');
    }
}
