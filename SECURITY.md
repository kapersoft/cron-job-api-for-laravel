# Security Policy

## Supported Versions

- **Package**: Only the latest released version of `kapersoft/cron-job-api-for-laravel` is supported with security fixes.
- **PHP**: Matches `composer.json` constraint (currently **^8.4**). Older PHP versions are not supported.
- **Laravel**: Matches `composer.json` constraint (currently **^12.0**).
- **Dependencies**: We follow upstream security releases; keep your lockfile up to date.

## Reporting a Vulnerability

- **Do not** open public issues for vulnerabilities.
- Prefer GitHub Security Advisories: open a private report via [Report a vulnerability](https://github.com/kapersoft/cron-job-api-for-laravel/security/advisories/new).
- Alternatively, email: [kapersoft@gmail.com](mailto:kapersoft@gmail.com).

Please include:

- A clear description, affected versions, and reproduction steps or PoC.
- Impact assessment and suggested remediation if known.

Response & handling:

- We aim to acknowledge within 48 hours and provide a mitigation or timeline within 7 days.
- Coordinated disclosure is appreciated; we’ll credit reporters unless you request otherwise.

## Security Considerations when using the package

- **API Key handling**: Configure via `CRON_JOB_API_KEY` in environment or `config/cron-job-api-for-laravel.php`. Never commit secrets. Rotate regularly.
- **Logging**: Avoid logging request headers or full requests/responses. If logging, redact `Authorization` and any sensitive payload fields.
- **Transport security**: Endpoints are HTTPS. Do not disable TLS verification. Use system CAs or an up-to-date trust store.
- **Timeouts/retries**: The default underlying `GuzzleHttp\Client` has no request timeout here. Provide your own Guzzle client or extend the container binding to enforce strict timeouts and retry/backoff policies.
- **Least privilege**: Generate and use credentials with minimal permissions for the tasks you automate (rotate if sharing contexts).
- **Input validation**: Validate any user-supplied values before passing them into API calls to prevent injection into downstream systems.
- **Dependency hygiene**: Keep `composer.lock` current and run security updates regularly.

## Questions?

- General questions: open a normal issue at the repo’s [Issues](https://github.com/kapersoft/cron-job-api-for-laravel/issues) page.
- Security-specific questions: email [kapersoft@gmail.com](mailto:kapersoft@gmail.com) or use the private advisory channel.
