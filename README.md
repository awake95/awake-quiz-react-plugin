# Plugin template with WPTU support
### Usage
1. Copy directory to new location
2. remove if exists `.idea` and `.git` in new location.
3. Update `README.md` if needed.
4. Update `composer.json`:
    1. Set proper `name` value.
    2. Set proper `description` value.


### WPTU integration
##### Key changes
###### Makefile
Added `Makefile` that allows automating build procedure, especially:
1. Make dist directory (see `build` workflow in `Makefile`)
2. Make zipball that is ready for installation (see `zipball` workflow in `Makefile`)
###### composer.json
Added `composer.json` for following:
1. Make possible to dynamically detect `SLUG` for `Makefile` 
###### Github actions workflow
To automate deployment project uses github actions feature that allows to automate build and deployment workflow.

By design for current solution `release` event only is used. To deploy the plugin to update server you need to make release. Make sure you are adding correct tag.

On release workflow will 
1. build package;
2. upload new package to WPTU server/service;
3. upload artifact to created release so it can be downloaded when needed.  
###### Repo configuration
1. Set correct `UPLOAD_PASSWORD` in repo secrets. This is the password used for communication with wetail-plugin-updates-repo.

###### Existing project integration
1. Make sure you have following files in your project (use this project as reference)
    1. `/Makefile`
        1. Check `build` section, make sure there are listed all files and directories that must be located in release file
    2. `/composer.json` with `yahnis-elsts/plugin-update-checker` in dependencies, 
see `require` in [composer.json](composer.json) for reference
    3. `/.github/workflows/release.yml`
2. Make sure you are calling `yahnis-elsts/plugin-update-checker`'s methods according to [docs](https://github.com/YahnisElsts/plugin-update-checker#self-hosted-plugins-and-themes)  
See example at [plugin.php#L49](plugin.php#L49) till line 56 Change `SLUG` parameter
3. Make sure your project WP-related header matches [requirements](https://developer.wordpress.org/plugins/plugin-basics/header-requirements/). Would be nice if header will be filled as much as possible.
