## Currency Exchange Rate Application

Bu uygulama, farklı API'lerden döviz kuru bilgilerini alır, karşılaştırır ve en ucuz olanını ana sayfada gösterir. Ayrıca, verileri veritabanına kaydeder ve bir komut dosyası kullanarak verileri günceller.

## Kurulum

1.  Projeyi Klonlayın
    -     https://github.com/meselicingihande/etiya-test-case
1.  Bağımlılıkları Yükleyin
    -     composer install
1.  Ortam Dosyasını Kopyalayın
    -     cp .env.example .env
1.  Çevresel Değişkenleri Yapılandırın

    -     DB_CONNECTION=mysql
          DB_HOST=127.0.0.1
          DB_PORT=3306
          DB_DATABASE=proje_db
          DB_USERNAME=root
          DB_PASSWORD=
    ya da
    -     DB_CONNECTION=pgsql
          DB_HOST=127.0.0.1
          DB_PORT=5432
          DB_DATABASE=proje_db
          DB_USERNAME=''
          DB_PASSWORD=''
    
1.  Veritabanı Yapılandırmasını yapın
    -     php artisan migrate
    

1.  Önbelleği Temizleyin
    -     php artisan config:cache

    

## Kullanım

1. Döviz Kurlarını Güncelleyin
      Döviz kurlarını API'lerden çekmek ve veritabanına kaydetmek için:
      -     php artisan fetch:rates
1. Uygulamayı Başlatın
      Geliştirme sunucusunu başlatın:
      -     php artisan serve

## Yeni API Eklenmesi

1. Sağlayıcı Yapılandırmaları (config/services.php)
   İlk olarak, mevcut ve yeni sağlayıcıların URL'lerini ve sınıf adlarını config/services.php dosyasına ekleyin:
    -     return [
           'exchange_rates' => [
             'provider1' => [
               'class' => App\Providers\CurrencyProviders\ProviderOneAdapter::class,
               'url' => env('PROVIDER1_URL'),
             ],
             'provider2' => [
               'class' => App\Providers\CurrencyProviders\ProviderTwoAdapter::class,
               'url' => env('PROVIDER2_URL'),
             ],
           // Yeni sağlayıcıyı buraya ekleyin
             'provider3' => [
              'class' => App\Providers\CurrencyProviders\ProviderThreeAdapter::class,
              'url' => env('PROVIDER3_URL'),
             ],
           ],
          ];
1. Sağlayıcı Sınıfları (Provider Adapters)
   Her bir sağlayıcı için bir adapter sınıfı oluşturun. Aşağıda namespace verilmiştir:
    -     namespace App\Providers\CurrencyProviders;
3. .env Dosyasına Yeni Sağlayıcıları Ekleyin

    -     PROVIDER1_URL=mock_api1
          PROVIDER2_URL=mock_api2

