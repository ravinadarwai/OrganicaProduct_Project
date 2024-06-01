@include('layout.header')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .image-container {
            width: 600px;
            height: 400px;
            margin-left: 26rem;
            margin-bottom: 2rem;
            position: relative;
        }

        .image-box {
            width: 100%;
            height: 100%;
            object-fit: cover;
            box-shadow: 4px 6px 20px rgba(0, 0, 0, 0.2), 4px 6px 20px rgba(0, 0, 0, 0.5); / Add black box shadow here /
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="font_3 wixui-rich-text__text" style="text-align:center; font-size:25px; margin:4rem;">About Our Market</h1>
        <div class="image-container">
            <img src="https://static.wixstatic.com/media/ad420a_669665f5ac454bf29853afbc02b635df~mv2.jpg/v1/fill/w_750,h_500,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/GettyImages-1128054012.jpg" alt="Woman at the cashier in a grocery store" class="image-box" />
        </div>
        <p style="margin: 3rem;">
Organic products encompass a wide range of categories, each offering unique benefits and flavors. From vibrant vegetables to succulent fruits, wholesome dairy products, and fresh fish, the organic market presents a plethora of options for health-conscious consumers.

Vegetables hold a prime position in the realm of organic products. Grown without synthetic pesticides and fertilizers, organic vegetables boast rich flavors and essential nutrients. From crisp lettuce to robust tomatoes, organic farming practices prioritize soil health and biodiversity, resulting in produce that's not only delicious but also environmentally sustainable. Choosing organic vegetables ensures that you're consuming food free from harmful chemicals, promoting both your well-being and the planet's health.</p>
  <p style="margin: 3rem;">In the realm of dairy products, organic options abound, offering consumers a healthier alternative to conventional dairy. Organic milk, cheese, and yogurt come from animals raised on organic feed, without the use of antibiotics or synthetic hormones. This ensures that the dairy products are free from harmful residues and provide essential nutrients without compromising animal welfare. By choosing organic dairy, consumers can enjoy creamy textures and rich flavors while supporting ethical farming practices that prioritize animal well-being and environmental sustainability.</p>
 </div>
    @include('layout.footer')
</body>
</html>