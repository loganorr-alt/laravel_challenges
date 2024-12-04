https://www.linode.com/docs/guides/use-laravel-forge-to-automate-web-server-creation-on-a-linode/

For time limitation reasons, here I go over the steps to set up Forge by hand. However forge has both a CLI and an SDK - the SDK being able to provision new servers. This would be perfect for creating a server by a script or in a pipeline - though there are limited uses for this. It is more useful to update an existing server via a pipeline rather than provision a new one (which is also potentially very pricey. 

# Set up prerequisties

I've provisioned a server using Forge here:

I'll allow this server to stay up for 2-3 weeks.

Forge doesn't host itself. Will need:

- A server host. In this example i've gone with Linode.
- A source control host - github
- forge itself.
- A domain to test with?


Steps:

### Preparation.

Forge will need api access into your server host.

In this case, i'm using Linode.

1. Click on my profile -> click Add personal Access Token
2. Fill this form in and set access controls. For this demo i've set expiry to a month, and set access to what i think may be needed. 
3. Note down the token. Make sure not to commit this into github.

Make sure the Laravel site is in a github repository as well.

### Set up Forge

note: to continue you need to agree to a plan. It's only a 5 day trial.

If you havn't made a Forge account before (like myself), on first login you'll be asked to link in a source control account, and a service provider. This can also be done from account settings.

Just following through the wizard. Using the key generated in the preparation phase. Linodes parent company is Akamai.

### Set up a server

In forge click on the server menu link and click 'create server'.



