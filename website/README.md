# website

This folder contains the code that is run on the kiwi website, which is a copy of the code club world site. I have not provided full source. Instead, code is attached within this repo as snippets.

This is partly because bits of it will be out of sync with the latest code on the official site, and partly to be clearer about what pieces are new additions vs existing code.

## Deployment / running

Because this is not the full source, there will be gaps once applying any snippets to your own code club website, e.g loading jquery into the pages


This deploys to

## What else?

There are many improvements that could be made

 * Move the main script block in layouts/default.html into its own file and call only on the pages that need it
 * Fix up the routing on the start-a-club pages so that they don't require a ?r= to run. This is leaky.
 * Package up all the additional code as snippits / widgets that can be easily replicated / hosted.
 * There are more that I haven't mentioned / thought of. If you have any suggestions, please feel free to provide these as a fork/PR, by raising an issue against the repo, or by emailing me directly at support@codeclub.nz.