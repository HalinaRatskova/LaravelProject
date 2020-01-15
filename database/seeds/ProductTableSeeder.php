<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product=new \App\Product([
            'imagePath'=>'http://vitex.by/upload/iblock/891/89177010bdf889040a4ed7a2c5bf618c.jpg',
            'title'=>'Day Face Mezo Cream 40+ Intensive Rejuvenation',
             'description'=>'The day cream increases skin firmness and elasticity, provides a lift effect, deeply hydrates your skin and restores the ideal 
              level of hydration, activates cell renewal and makes your skin smoother and more radiant.',
              'price'=>'10'
               ]);
              $product->save();
     
              $product=new App\Product([
                 'imagePath'=>'http://vitex.by/upload/iblock/fc1/fc1649589d31d43cba9081c2c7b2b1d2.jpg',
                 'title'=>'Day Face Mezo Cream 50+ Comprehensive Rejuvenation',
                  'description'=>'The day cream provides a comprehensive effect on facial skin: efficiently smooths wrinkles around the beauty triangle, provides a 
                   lift effect, deeply hydrates, strengthens collagen, elastin and hyaluronic acid synthesis.',
                   'price'=>'10'
                    ]);
                   $product->save();
     
                   $product=new App\Product([
                     'imagePath'=>'http://vitex.by/upload/iblock/810/8106e34151c93c15c54012c0169323e0.jpg',
                     'title'=>'Active Care for Mature Skin Day Face Mezo Cream 60+',
                      'description'=>'Cream contains specially selected high-performance components that provide a comprehensive effect on facial skin, softening and reducing wrinkles, deeply 
                       nourishing and moisturizing, reducing age-related pigmentation.',
                       'price'=>'10'
                        ]);
                       $product->save();
     
                       $product=new App\Product([
                         'imagePath'=>'http://vitex.by/upload/iblock/9f7/9f7711081fd75e91e8ec8753849b8e42.jpg',
                         'title'=>'Eye Mezo Cream 40+ Intensive Rejuvenation',
                          'description'=>'The cream for eyes reduces puffiness and dark circles under the eyes, smooths away wrinkles, lifts, restores the ideal level of eyelid skin hydration and increases
                            microcirculation.',
                           'price'=>'15'
                            ]);
                           $product->save();
     
                           $product=new App\Product([
                             'imagePath'=>'http://vitex.by/upload/iblock/307/307934c6fa8f85f62ff39d2407f25edf.jpg',
                             'title'=>'Eye Mezo Cream 50+ Intensive Rejuvenation',
                              'description'=>'The cream for eyes reduces puffiness and dark circles under the eyes, smooths away wrinkles, lifts, restores the ideal level of eyelid skin hydration and increases
                                microcirculation.',
                               'price'=>'15'
                                ]);
                               $product->save();
     
                               $product=new App\Product([
                                 'imagePath'=>'http://vitex.by/upload/iblock/bed/bed3fdcf90429f3ce67f3851f1d9c8b5.jpg',
                                 'title'=>'Facial Mezo Mask Intensive Rejuvanation',
                                  'description'=>'The cream for eyes reduces puffiness and dark circles under the eyes, smooths away wrinkles, lifts, restores the ideal level of eyelid skin hydration and increases
                                   microcirculation.',
                                   'price'=>'12'
                                    ]);
                                   $product->save();
     
                                   $product=new App\Product([
                                    'imagePath'=>'http://vitex.by/upload/iblock/9b5/9b5e2f7e03372c7eb88394fb01c39245.jpg',
                                    'title'=>'Antibacterial Liquid Patch Facial Point Gel',
                                     'description'=>'Daily application of serum quickly restores facial contours, skin smoothness and elasticity.',
                                      'price'=>'20'
                                       ]);
                                      $product->save();
                                      $product=new App\Product([
                                        'imagePath'=>'http://vitex.by/upload/iblock/5da/5da059f086a352c70f31197a891a270e.jpg',
                                        'title'=>'Mattifying Day Cream for Oily Skin',
                                         'description'=>'Provide hydration, nutrition and skin protection, contribute to the formation of a deliciously fresh.',
                                          'price'=>'35'
                                           ]);
                                          $product->save();
                                          $product=new App\Product([
                                            'imagePath'=>'http://vitex.by/upload/iblock/47c/47c17051fa8ace62ac0b3dea5a33a7cd.jpg',
                                            'title'=>'3 in 1 Green Tea and Cactus Facial Tonic',
                                             'description'=>'Nourishes the skin with antioxidant power. Renews, smooths, gives radiance and makes the skin clean.',
                                              'price'=>'30'
                                               ]);
                                              $product->save();
                                              $product=new App\Product([
                                                'imagePath'=>'http://vitex.by/upload/iblock/f3f/f3f4a1de82f0a1488b1f6117cd9e3939.jpg',
                                                'title'=>'Face Night Cream for Combination Skin',
                                                 'description'=>'The density, elasticity and skin tone are restored, the oval of the face is modeled and strengthened.',
                                                  'price'=>'28'
                                                   ]);
                                                  $product->save();
                                                  $product=new App\Product([
                                                    'imagePath'=>'http://vitex.by/upload/iblock/9f7/9f7c1dacd9ee3a64de30cafb48bbe101.jpg',
                                                    'title'=>'Sebum Normalizing Care Shampoo',
                                                     'description'=>'In the most natural transparent formula of the shampoo, the most valuable components are skillfully combined.',
                                                      'price'=>'25'
                                                       ]);
                                                      $product->save();
                                                  
                                                      $product=new App\Product([
                                                        'imagePath'=>'http://vitex.by/upload/iblock/2a0/2a00d44c03e5e409dee7b2806ec2e1ab.jpg',
                                                        'title'=>'Sebum Normalizing Care Hair Balm',
                                                         'description'=>'Ultra-light hair balm with the most effective transparent formula designed specifically for hair, oily at the roots and dry at the tips.',
                                                          'price'=>'29'
                                                           ]);
                                                          $product->save();
                                                      
    }
}
