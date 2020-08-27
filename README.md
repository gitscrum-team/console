# GitScrum Console 
## for Laravel Artisan Console

Manage your project and your team's tasks, all through console commands.
Learn more about the [GitScrum Console ](https://gitscrum.com/labs/console)

                                     ▄█████▄
                                    ██▀╡▒╚██▌  ,▄███▄
                                    ██╙╙╙╠╠██ ▄██╠╚╠██▌
                                    ██   ▐╟█▌ ██▒▒▒▒╚██
                                   ▐██   Å██Ö ██   ╚╣██
                                    █▌  ]██▌ ]██   j╟█▌
                                   ██   ██▌  ╟█▌   ▐██ 
                                  ██▌  ██▌   ██    ╫█▌
                                 ██▀  ▐█▌   ╟█▌   ▐██
                               ▄██▀   ██   ▐██    ██
                            ▄▄██▀    ▐██▄▄███   ▄██
                         ▄███▀         ▀▀▀▀    ▄██
                       ▄██▀                   ██▀
                     ▄██                    ▄██ 
                    ██▀                      ██▄
                   ██▀                        ██▌
                  ██▀                          ██▄
                  █▌                            ██
                 ██        ▀█▀\      ▀█▀         █▌
                ▐█▌                             ▐██
                 █▌             ▀██▀             ██
        ▄██████████████████████████████████████████████████▄
       ██▀░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░│╟█▌
       ██░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▐█▌
       ██▒░░░░░░░░░░░░░░░░░░░░░░░░░░░Γ░░░░░░░░░░░░░░░░░░░░╟█▌
       ▐█▌░░░░░░░░░░░░░░░░░░░░░░░░░░░   φ░░░░░░░░░░░░░░░░Γ██
        ██░░░░░░░░░░░░░░░░░░░░░░░"    ,,,░░░░░░░░░░░░░░░░j█▌
        ██░░░░░░░░░░░░░░░░░░░░░      φ░░░░░░░░░░░░░░░░░░░╟█▌
         █▒░░░░░░░░░░░░░░░░░░ , φ░░░░░░░░░░░░░░░░░░░░░░Γ██



<p align="center">
<a href="https://gitscrum.com"><img src="https://site.gitscrum.com/badges/project.svg?project=gitscrum/gitscrum-console" alt="GitScrum"></a>
</p>

### The power of project management in a few command lines.

## What's GitScrum?

##### GitScrum is a platform to manage projects and motivate people to work better and happier ⚡ 
Learn more about the GitScrum <https://gitscrum.com>

## Installation

You can install the package via composer:

```bash
$ composer require gitscrum/console
```
### Laravel 5.5 and up

Laravel 5.5 and up uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

### Publish configuration file

 `php artisan vendor:publish --provider="GitScrum\Console\ServiceProvider"`

## Roadmap

<table>
    <tr>
        <td><strong>Feature</strong></td>
        <td><strong>Description</strong></td>
        <td><strong>Status</strong></td>
    </tr>
    <tr>
        <td>Sign in</td>
        <td>Authentication on GitScrum</td>
        <td>Completed</td>
    </tr>
    <tr>
        <td>Logout</td>
        <td>Remove user credentials</td>
        <td>Completed</td>
    </tr>
    <tr>
        <td>My Next Tasks</td>
        <td>See the next tasks you need to work on the project</td>
        <td>Completed</td>
    </tr>
    <tr>
        <td>Task</td>
        <td>See task details</td>
        <td>Completed</td>
    </tr>
    <tr>
        <td>Task Comments</td>
        <td>List comments on a task and post new comment</td>
        <td>-</td>
    </tr>
    <tr>
        <td>Sprints</td>
        <td>List sprints on a project and create new sprint</td>
        <td>-</td>
    </tr>
    <tr>
        <td>User Stories</td>
        <td>List User Stories on a project and create new user story</td>
        <td>-</td>
    </tr>
    

</table>

<hr />

## Configuration

After installing package, you will need to configure some options

### Project Credentials

Go to [GitScrum](https://site.gitscrum.com). To obtain credentials you must be the project owner or project admin.

After, you should go to your project. Click on Project Settings and then API Management to obtain the credentials that will be used for .env to authenticate to the project.

<img src="https://site.gitscrum.com/img/api-credentials.png" />

Take the credentials and add them to the .env file

```
STORAGE_DISK=local
API_ID=
PROJECT_KEY=
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits / Do you need help?

Renato Marinho: [GitHub](https://github.com/renatomarinho) / [LinkedIn](https://www.linkedin.com/in/renatomarinho13)
[All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
