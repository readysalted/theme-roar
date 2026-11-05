# Google Maps configuration

The map module used by About and Contact reads its Maps JavaScript API key
from the WordPress option `roar_google_maps_api_key`.

Administrators can replace the key under **Settings > General > Google Maps API key**,
then click **Save Changes**. The field masks its current value. Invalid or empty
values are rejected and the existing key is kept.

Configure this option separately for each environment, using the key supplied
through the password manager. The key is deliberately not stored in this repository.
The production option was configured on 5 November 2026.

When migrating the site, include this option in the database migration.
A theme-only deployment does not copy the key. For a new environment, an
administrator can set it with `update_option( 'roar_google_maps_api_key', $key, false )`
from a secure WordPress maintenance context. Do not commit the actual key.

The existing ACF Google API filter is separate and does not configure the public map.
