To send message, run the following

docker build -t notifier-image . \
docker run -v $(pwd):/notifier notifier-image php artisan notify "My fabulous message" --email={your_email} --phone={your_phone_number}
