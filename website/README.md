# website

This code adds functionality on top of the base Code Club World website. It adds the ability for users to find venues and volunteers, and to add themselves to the list.

## Info

This is code that is run on the kiwi website, which started as a copy of the code club world site. I have not provided full source; instead, code is attached within this repo as snippets.

This is partly to avoid confusion in case bits of the site are out of sync with the latest available Code Club World website code, and partly to be clearer about what pieces are new additions vs existing code.

## Deployment / running

Because this is not the full source, there may (or will) be gaps once applying any snippets to your own code club website


## What else?

There are many improvements that could be made

 * Privacy disclaimers
 * Move the main script block in layouts/default.html into its own file and call only on the pages that need it
 * Fix up the routing on the start-a-club pages so that they don't require a ?r= to run. This is leaky.
 * Package up all the additional code as snippits / widgets that can be easily replicated / hosted.
 * There are more that I haven't mentioned / thought of. If you have any suggestions, please feel free to provide these as a fork/PR, by raising an issue against the repo, or by emailing me directly at support@codeclub.nz.