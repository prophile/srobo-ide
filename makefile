_REPOS = repos/1 repos/2

.PHONY: all default dev docs clean applet

# Useful groupings
default: dev
all: dev docs

applet: applet/build.xml
	cd applet/ && ant clean && ant build

# Actual targets
clean:
	rm -rf repos html latex

dev: $(_REPOS)

docs:
	doxygen doxyfile

# Helpers
$(_REPOS):
	mkdir -p $@
	chmod a+rwx $@

