# WordPress Project

This is a WordPress starter project for use with Composer. I'll add more documentation when I can, but it's based heavily off of Mark Jaquith's [WordPress Skeleton](https://github.com/markjaquith/WordPress-Skeleton) project. To get started using it, just use the `create-project` composer command:

```
composer create-project johnpbloch/wordpress-project [YOUR-NAME]-assessment 1.0.2
```

This will create the project in the `[YOUR-NAME]-assessment` directory. The project uses `public` as the document root, so make sure to take that into account in your host configurations.

Site configuration is in the `.env` file. If you want to define a constant there, prefix the constant name with `WPC_`.

## License

MIT
