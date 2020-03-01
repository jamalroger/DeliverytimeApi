# DeliveryTimeApi api  using laravel with passposrt Auth 

please read how install the app

-- Requirements 

     -- php 
     -- composer

-- Installation 

    -- git clone https://github.com/jamalroger/DeliverytimeApi.git
    -- cd DeliverytimeApi 
    -- composer install
    -- edit .env change db config
    
-- Serve app

    -- php artisan migarte --seed
    -- php artisan serve
    
-- Note

    -- by default there is no authentification please add middleware ['auth:api','AuthAdmin'] for Admin Auth or for user just ['auth:api']
    
    


