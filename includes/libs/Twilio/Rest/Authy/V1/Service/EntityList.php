<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Authy\V1\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class EntityList extends ListResource {
    /**
     * Construct the EntityList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid Service Sid.
     */
    public function __construct(Version $version, string $serviceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Entities';
    }

    /**
     * Create the EntityInstance
     *
     * @param string $identity Unique identity of the Entity
     * @param array|Options $options Optional Arguments
     * @return EntityInstance Created EntityInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $identity, array $options = []): EntityInstance {
        $options = new Values($options);

        $data = Values::of(['Identity' => $identity, ]);
        $headers = Values::of(['Twilio-Sandbox-Mode' => $options['twilioSandboxMode'], ]);

        $payload = $this->version->create('POST', $this->uri, [], $data, $headers);

        return new EntityInstance($this->version, $payload, $this->solution['serviceSid']);
    }

    /**
     * Streams EntityInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(array $options = [], int $limit = null, $pageSize = null): Stream {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($options, $limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads EntityInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return EntityInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null): array {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of EntityInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return EntityPage Page of EntityInstance
     */
    public function page(array $options = [], $pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE): EntityPage {
        $options = new Values($options);

        $params = Values::of(['PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize, ]);
        $headers = Values::of(['Twilio-Sandbox-Mode' => $options['twilioSandboxMode'], ]);

        $response = $this->version->page('GET', $this->uri, $params, [], $headers);

        return new EntityPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of EntityInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return EntityPage Page of EntityInstance
     */
    public function getPage(string $targetUrl): EntityPage {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new EntityPage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a EntityContext
     *
     * @param string $identity Unique identity of the Entity
     */
    public function getContext(string $identity): EntityContext {
        return new EntityContext($this->version, $this->solution['serviceSid'], $identity);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Authy.V1.EntityList]';
    }
}