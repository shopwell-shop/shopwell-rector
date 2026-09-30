# Shopwell Rector fork guardrails

This is the Shopwell-derived Rector extension. Product code, documentation,
tests, manifests, paths, and metadata must not contain the upstream brand. The
only legal-text exception is the verbatim upstream license in `NOTICE`.
Project-owned manifests use Apache License 2.0.

Before publishing or reporting a successful sync, run from `/Users/goxs/Workspaces/shopwell/sync-upstream`:

```bash
./bin/syncctl audit-license shopware-rector
./bin/syncctl audit-upstream-dependencies shopware-rector
```

Keep the Composer package on the normal registry. Do not use Git URLs,
branches, commits, local paths, or VCS repositories for released consumers.
