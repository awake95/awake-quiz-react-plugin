SLUG := $(shell composer show --self | head -n1 | awk -F'/' '{print $$2}')
build:
	mkdir -p $(SLUG)
	composer install
	cp -r includes $(SLUG)/
	cp -r vendor $(SLUG)/
	cp -r autoload.php $(SLUG)/
	cp -r plugin.php $(SLUG)/
	cp -r composer.json $(SLUG)/

clean:
	rm -rf $(SLUG)
	[ -f dist.zip ] && rm dist.zip

zipball: build
	zip -r dist.zip $(SLUG)/