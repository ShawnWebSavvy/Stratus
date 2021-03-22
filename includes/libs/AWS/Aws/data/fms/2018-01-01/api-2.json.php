<?php
// This file was auto-generated from sdk-root/src/data/fms/2018-01-01/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-01-01', 'endpointPrefix' => 'fms', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceAbbreviation' => 'FMS', 'serviceFullName' => 'Firewall Management Service', 'serviceId' => 'FMS', 'signatureVersion' => 'v4', 'targetPrefix' => 'AWSFMS_20180101', 'uid' => 'fms-2018-01-01', ], 'operations' => [ 'AssociateAdminAccount' => [ 'name' => 'AssociateAdminAccount', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateAdminAccountRequest', ], 'errors' => [ [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InvalidInputException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'DeleteAppsList' => [ 'name' => 'DeleteAppsList', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteAppsListRequest', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'DeleteNotificationChannel' => [ 'name' => 'DeleteNotificationChannel', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteNotificationChannelRequest', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'DeletePolicy' => [ 'name' => 'DeletePolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeletePolicyRequest', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'DeleteProtocolsList' => [ 'name' => 'DeleteProtocolsList', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteProtocolsListRequest', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'DisassociateAdminAccount' => [ 'name' => 'DisassociateAdminAccount', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DisassociateAdminAccountRequest', ], 'errors' => [ [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'GetAdminAccount' => [ 'name' => 'GetAdminAccount', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetAdminAccountRequest', ], 'output' => [ 'shape' => 'GetAdminAccountResponse', ], 'errors' => [ [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'GetAppsList' => [ 'name' => 'GetAppsList', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetAppsListRequest', ], 'output' => [ 'shape' => 'GetAppsListResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'GetComplianceDetail' => [ 'name' => 'GetComplianceDetail', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetComplianceDetailRequest', ], 'output' => [ 'shape' => 'GetComplianceDetailResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidInputException', ], [ 'shape' => 'InvalidOperationException', ], ], ], 'GetNotificationChannel' => [ 'name' => 'GetNotificationChannel', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetNotificationChannelRequest', ], 'output' => [ 'shape' => 'GetNotificationChannelResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'GetPolicy' => [ 'name' => 'GetPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetPolicyRequest', ], 'output' => [ 'shape' => 'GetPolicyResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidTypeException', ], ], ], 'GetProtectionStatus' => [ 'name' => 'GetProtectionStatus', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetProtectionStatusRequest', ], 'output' => [ 'shape' => 'GetProtectionStatusResponse', ], 'errors' => [ [ 'shape' => 'InvalidInputException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'GetProtocolsList' => [ 'name' => 'GetProtocolsList', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetProtocolsListRequest', ], 'output' => [ 'shape' => 'GetProtocolsListResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'GetViolationDetails' => [ 'name' => 'GetViolationDetails', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'GetViolationDetailsRequest', ], 'output' => [ 'shape' => 'GetViolationDetailsResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidInputException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'ListAppsLists' => [ 'name' => 'ListAppsLists', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListAppsListsRequest', ], 'output' => [ 'shape' => 'ListAppsListsResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'ListComplianceStatus' => [ 'name' => 'ListComplianceStatus', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListComplianceStatusRequest', ], 'output' => [ 'shape' => 'ListComplianceStatusResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'ListMemberAccounts' => [ 'name' => 'ListMemberAccounts', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListMemberAccountsRequest', ], 'output' => [ 'shape' => 'ListMemberAccountsResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'ListPolicies' => [ 'name' => 'ListPolicies', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListPoliciesRequest', ], 'output' => [ 'shape' => 'ListPoliciesResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'ListProtocolsLists' => [ 'name' => 'ListProtocolsLists', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListProtocolsListsRequest', ], 'output' => [ 'shape' => 'ListProtocolsListsResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidInputException', ], ], ], 'PutAppsList' => [ 'name' => 'PutAppsList', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'PutAppsListRequest', ], 'output' => [ 'shape' => 'PutAppsListResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InvalidInputException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'PutNotificationChannel' => [ 'name' => 'PutNotificationChannel', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'PutNotificationChannelRequest', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'PutPolicy' => [ 'name' => 'PutPolicy', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'PutPolicyRequest', ], 'output' => [ 'shape' => 'PutPolicyResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InvalidInputException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidTypeException', ], ], ], 'PutProtocolsList' => [ 'name' => 'PutProtocolsList', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'PutProtocolsListRequest', ], 'output' => [ 'shape' => 'PutProtocolsListResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InvalidInputException', ], [ 'shape' => 'LimitExceededException', ], [ 'shape' => 'InternalErrorException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidInputException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidOperationException', ], [ 'shape' => 'InternalErrorException', ], [ 'shape' => 'InvalidInputException', ], ], ], ], 'shapes' => [ 'AWSAccountId' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '^[0-9]+$', ], 'AccountRoleStatus' => [ 'type' => 'string', 'enum' => [ 'READY', 'CREATING', 'PENDING_DELETION', 'DELETING', 'DELETED', ], ], 'App' => [ 'type' => 'structure', 'required' => [ 'AppName', 'Protocol', 'Port', ], 'members' => [ 'AppName' => [ 'shape' => 'ResourceName', ], 'Protocol' => [ 'shape' => 'Protocol', ], 'Port' => [ 'shape' => 'IPPortNumber', ], ], ], 'AppsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'App', ], ], 'AppsListData' => [ 'type' => 'structure', 'required' => [ 'ListName', 'AppsList', ], 'members' => [ 'ListId' => [ 'shape' => 'ListId', ], 'ListName' => [ 'shape' => 'ResourceName', ], 'ListUpdateToken' => [ 'shape' => 'UpdateToken', ], 'CreateTime' => [ 'shape' => 'TimeStamp', ], 'LastUpdateTime' => [ 'shape' => 'TimeStamp', ], 'AppsList' => [ 'shape' => 'AppsList', ], 'PreviousAppsList' => [ 'shape' => 'PreviousAppsList', ], ], ], 'AppsListDataSummary' => [ 'type' => 'structure', 'members' => [ 'ListArn' => [ 'shape' => 'ResourceArn', ], 'ListId' => [ 'shape' => 'ListId', ], 'ListName' => [ 'shape' => 'ResourceName', ], 'AppsList' => [ 'shape' => 'AppsList', ], ], ], 'AppsListsData' => [ 'type' => 'list', 'member' => [ 'shape' => 'AppsListDataSummary', ], ], 'AssociateAdminAccountRequest' => [ 'type' => 'structure', 'required' => [ 'AdminAccount', ], 'members' => [ 'AdminAccount' => [ 'shape' => 'AWSAccountId', ], ], ], 'AwsEc2InstanceViolation' => [ 'type' => 'structure', 'members' => [ 'ViolationTarget' => [ 'shape' => 'ViolationTarget', ], 'AwsEc2NetworkInterfaceViolations' => [ 'shape' => 'AwsEc2NetworkInterfaceViolations', ], ], ], 'AwsEc2NetworkInterfaceViolation' => [ 'type' => 'structure', 'members' => [ 'ViolationTarget' => [ 'shape' => 'ViolationTarget', ], 'ViolatingSecurityGroups' => [ 'shape' => 'ResourceIdList', ], ], ], 'AwsEc2NetworkInterfaceViolations' => [ 'type' => 'list', 'member' => [ 'shape' => 'AwsEc2NetworkInterfaceViolation', ], ], 'AwsVPCSecurityGroupViolation' => [ 'type' => 'structure', 'members' => [ 'ViolationTarget' => [ 'shape' => 'ViolationTarget', ], 'ViolationTargetDescription' => [ 'shape' => 'LengthBoundedString', ], 'PartialMatches' => [ 'shape' => 'PartialMatches', ], 'PossibleSecurityGroupRemediationActions' => [ 'shape' => 'SecurityGroupRemediationActions', ], ], ], 'Boolean' => [ 'type' => 'boolean', ], 'CIDR' => [ 'type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '[a-f0-9:./]+', ], 'ComplianceViolator' => [ 'type' => 'structure', 'members' => [ 'ResourceId' => [ 'shape' => 'ResourceId', ], 'ViolationReason' => [ 'shape' => 'ViolationReason', ], 'ResourceType' => [ 'shape' => 'ResourceType', ], ], ], 'ComplianceViolators' => [ 'type' => 'list', 'member' => [ 'shape' => 'ComplianceViolator', ], ], 'CustomerPolicyScopeId' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'CustomerPolicyScopeIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'CustomerPolicyScopeId', ], ], 'CustomerPolicyScopeIdType' => [ 'type' => 'string', 'enum' => [ 'ACCOUNT', 'ORG_UNIT', ], ], 'CustomerPolicyScopeMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'CustomerPolicyScopeIdType', ], 'value' => [ 'shape' => 'CustomerPolicyScopeIdList', ], ], 'DeleteAppsListRequest' => [ 'type' => 'structure', 'required' => [ 'ListId', ], 'members' => [ 'ListId' => [ 'shape' => 'ListId', ], ], ], 'DeleteNotificationChannelRequest' => [ 'type' => 'structure', 'members' => [], ], 'DeletePolicyRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], 'DeleteAllPolicyResources' => [ 'shape' => 'Boolean', ], ], ], 'DeleteProtocolsListRequest' => [ 'type' => 'structure', 'required' => [ 'ListId', ], 'members' => [ 'ListId' => [ 'shape' => 'ListId', ], ], ], 'DependentServiceName' => [ 'type' => 'string', 'enum' => [ 'AWSCONFIG', 'AWSWAF', 'AWSSHIELD_ADVANCED', 'AWSVPC', ], ], 'DetailedInfo' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'DisassociateAdminAccountRequest' => [ 'type' => 'structure', 'members' => [], ], 'ErrorMessage' => [ 'type' => 'string', ], 'EvaluationResult' => [ 'type' => 'structure', 'members' => [ 'ComplianceStatus' => [ 'shape' => 'PolicyComplianceStatusType', ], 'ViolatorCount' => [ 'shape' => 'ResourceCount', ], 'EvaluationLimitExceeded' => [ 'shape' => 'Boolean', ], ], ], 'EvaluationResults' => [ 'type' => 'list', 'member' => [ 'shape' => 'EvaluationResult', ], ], 'GetAdminAccountRequest' => [ 'type' => 'structure', 'members' => [], ], 'GetAdminAccountResponse' => [ 'type' => 'structure', 'members' => [ 'AdminAccount' => [ 'shape' => 'AWSAccountId', ], 'RoleStatus' => [ 'shape' => 'AccountRoleStatus', ], ], ], 'GetAppsListRequest' => [ 'type' => 'structure', 'required' => [ 'ListId', ], 'members' => [ 'ListId' => [ 'shape' => 'ListId', ], 'DefaultList' => [ 'shape' => 'Boolean', ], ], ], 'GetAppsListResponse' => [ 'type' => 'structure', 'members' => [ 'AppsList' => [ 'shape' => 'AppsListData', ], 'AppsListArn' => [ 'shape' => 'ResourceArn', ], ], ], 'GetComplianceDetailRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', 'MemberAccount', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], 'MemberAccount' => [ 'shape' => 'AWSAccountId', ], ], ], 'GetComplianceDetailResponse' => [ 'type' => 'structure', 'members' => [ 'PolicyComplianceDetail' => [ 'shape' => 'PolicyComplianceDetail', ], ], ], 'GetNotificationChannelRequest' => [ 'type' => 'structure', 'members' => [], ], 'GetNotificationChannelResponse' => [ 'type' => 'structure', 'members' => [ 'SnsTopicArn' => [ 'shape' => 'ResourceArn', ], 'SnsRoleName' => [ 'shape' => 'ResourceArn', ], ], ], 'GetPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], ], ], 'GetPolicyResponse' => [ 'type' => 'structure', 'members' => [ 'Policy' => [ 'shape' => 'Policy', ], 'PolicyArn' => [ 'shape' => 'ResourceArn', ], ], ], 'GetProtectionStatusRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], 'MemberAccountId' => [ 'shape' => 'AWSAccountId', ], 'StartTime' => [ 'shape' => 'TimeStamp', ], 'EndTime' => [ 'shape' => 'TimeStamp', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'PaginationMaxResults', ], ], ], 'GetProtectionStatusResponse' => [ 'type' => 'structure', 'members' => [ 'AdminAccountId' => [ 'shape' => 'AWSAccountId', ], 'ServiceType' => [ 'shape' => 'SecurityServiceType', ], 'Data' => [ 'shape' => 'ProtectionData', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'GetProtocolsListRequest' => [ 'type' => 'structure', 'required' => [ 'ListId', ], 'members' => [ 'ListId' => [ 'shape' => 'ListId', ], 'DefaultList' => [ 'shape' => 'Boolean', ], ], ], 'GetProtocolsListResponse' => [ 'type' => 'structure', 'members' => [ 'ProtocolsList' => [ 'shape' => 'ProtocolsListData', ], 'ProtocolsListArn' => [ 'shape' => 'ResourceArn', ], ], ], 'GetViolationDetailsRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', 'MemberAccount', 'ResourceId', 'ResourceType', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], 'MemberAccount' => [ 'shape' => 'AWSAccountId', ], 'ResourceId' => [ 'shape' => 'ResourceId', ], 'ResourceType' => [ 'shape' => 'ResourceType', ], ], ], 'GetViolationDetailsResponse' => [ 'type' => 'structure', 'members' => [ 'ViolationDetail' => [ 'shape' => 'ViolationDetail', ], ], ], 'IPPortNumber' => [ 'type' => 'long', 'max' => 65535, 'min' => 0, ], 'InternalErrorException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidInputException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidOperationException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidTypeException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'IssueInfoMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'DependentServiceName', ], 'value' => [ 'shape' => 'DetailedInfo', ], ], 'LengthBoundedString' => [ 'type' => 'string', 'max' => 1024, 'min' => 0, ], 'LimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ListAppsListsRequest' => [ 'type' => 'structure', 'required' => [ 'MaxResults', ], 'members' => [ 'DefaultLists' => [ 'shape' => 'Boolean', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'PaginationMaxResults', ], ], ], 'ListAppsListsResponse' => [ 'type' => 'structure', 'members' => [ 'AppsLists' => [ 'shape' => 'AppsListsData', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListComplianceStatusRequest' => [ 'type' => 'structure', 'required' => [ 'PolicyId', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'PaginationMaxResults', ], ], ], 'ListComplianceStatusResponse' => [ 'type' => 'structure', 'members' => [ 'PolicyComplianceStatusList' => [ 'shape' => 'PolicyComplianceStatusList', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListId' => [ 'type' => 'string', 'max' => 36, 'min' => 36, 'pattern' => '^[a-z0-9A-Z-]{36}$', ], 'ListMemberAccountsRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'PaginationMaxResults', ], ], ], 'ListMemberAccountsResponse' => [ 'type' => 'structure', 'members' => [ 'MemberAccounts' => [ 'shape' => 'MemberAccounts', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListPoliciesRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'PaginationMaxResults', ], ], ], 'ListPoliciesResponse' => [ 'type' => 'structure', 'members' => [ 'PolicyList' => [ 'shape' => 'PolicySummaryList', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListProtocolsListsRequest' => [ 'type' => 'structure', 'required' => [ 'MaxResults', ], 'members' => [ 'DefaultLists' => [ 'shape' => 'Boolean', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], 'MaxResults' => [ 'shape' => 'PaginationMaxResults', ], ], ], 'ListProtocolsListsResponse' => [ 'type' => 'structure', 'members' => [ 'ProtocolsLists' => [ 'shape' => 'ProtocolsListsData', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'ResourceArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'TagList' => [ 'shape' => 'TagList', ], ], ], 'ManagedServiceData' => [ 'type' => 'string', 'max' => 4096, 'min' => 1, 'pattern' => '.*', ], 'MemberAccounts' => [ 'type' => 'list', 'member' => [ 'shape' => 'AWSAccountId', ], ], 'PaginationMaxResults' => [ 'type' => 'integer', 'max' => 100, 'min' => 1, ], 'PaginationToken' => [ 'type' => 'string', 'max' => 4096, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'PartialMatch' => [ 'type' => 'structure', 'members' => [ 'Reference' => [ 'shape' => 'ReferenceRule', ], 'TargetViolationReasons' => [ 'shape' => 'TargetViolationReasons', ], ], ], 'PartialMatches' => [ 'type' => 'list', 'member' => [ 'shape' => 'PartialMatch', ], ], 'Policy' => [ 'type' => 'structure', 'required' => [ 'PolicyName', 'SecurityServicePolicyData', 'ResourceType', 'ExcludeResourceTags', 'RemediationEnabled', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], 'PolicyName' => [ 'shape' => 'ResourceName', ], 'PolicyUpdateToken' => [ 'shape' => 'PolicyUpdateToken', ], 'SecurityServicePolicyData' => [ 'shape' => 'SecurityServicePolicyData', ], 'ResourceType' => [ 'shape' => 'ResourceType', ], 'ResourceTypeList' => [ 'shape' => 'ResourceTypeList', ], 'ResourceTags' => [ 'shape' => 'ResourceTags', ], 'ExcludeResourceTags' => [ 'shape' => 'Boolean', ], 'RemediationEnabled' => [ 'shape' => 'Boolean', ], 'IncludeMap' => [ 'shape' => 'CustomerPolicyScopeMap', ], 'ExcludeMap' => [ 'shape' => 'CustomerPolicyScopeMap', ], ], ], 'PolicyComplianceDetail' => [ 'type' => 'structure', 'members' => [ 'PolicyOwner' => [ 'shape' => 'AWSAccountId', ], 'PolicyId' => [ 'shape' => 'PolicyId', ], 'MemberAccount' => [ 'shape' => 'AWSAccountId', ], 'Violators' => [ 'shape' => 'ComplianceViolators', ], 'EvaluationLimitExceeded' => [ 'shape' => 'Boolean', ], 'ExpiredAt' => [ 'shape' => 'TimeStamp', ], 'IssueInfoMap' => [ 'shape' => 'IssueInfoMap', ], ], ], 'PolicyComplianceStatus' => [ 'type' => 'structure', 'members' => [ 'PolicyOwner' => [ 'shape' => 'AWSAccountId', ], 'PolicyId' => [ 'shape' => 'PolicyId', ], 'PolicyName' => [ 'shape' => 'ResourceName', ], 'MemberAccount' => [ 'shape' => 'AWSAccountId', ], 'EvaluationResults' => [ 'shape' => 'EvaluationResults', ], 'LastUpdated' => [ 'shape' => 'TimeStamp', ], 'IssueInfoMap' => [ 'shape' => 'IssueInfoMap', ], ], ], 'PolicyComplianceStatusList' => [ 'type' => 'list', 'member' => [ 'shape' => 'PolicyComplianceStatus', ], ], 'PolicyComplianceStatusType' => [ 'type' => 'string', 'enum' => [ 'COMPLIANT', 'NON_COMPLIANT', ], ], 'PolicyId' => [ 'type' => 'string', 'max' => 36, 'min' => 36, 'pattern' => '^[a-z0-9A-Z-]{36}$', ], 'PolicySummary' => [ 'type' => 'structure', 'members' => [ 'PolicyArn' => [ 'shape' => 'ResourceArn', ], 'PolicyId' => [ 'shape' => 'PolicyId', ], 'PolicyName' => [ 'shape' => 'ResourceName', ], 'ResourceType' => [ 'shape' => 'ResourceType', ], 'SecurityServiceType' => [ 'shape' => 'SecurityServiceType', ], 'RemediationEnabled' => [ 'shape' => 'Boolean', ], ], ], 'PolicySummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'PolicySummary', ], ], 'PolicyUpdateToken' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'PreviousAppsList' => [ 'type' => 'map', 'key' => [ 'shape' => 'PreviousListVersion', ], 'value' => [ 'shape' => 'AppsList', ], ], 'PreviousListVersion' => [ 'type' => 'string', 'max' => 2, 'min' => 1, 'pattern' => '^\\d{1,2}$', ], 'PreviousProtocolsList' => [ 'type' => 'map', 'key' => [ 'shape' => 'PreviousListVersion', ], 'value' => [ 'shape' => 'ProtocolsList', ], ], 'ProtectionData' => [ 'type' => 'string', ], 'Protocol' => [ 'type' => 'string', 'max' => 20, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'ProtocolsList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Protocol', ], ], 'ProtocolsListData' => [ 'type' => 'structure', 'required' => [ 'ListName', 'ProtocolsList', ], 'members' => [ 'ListId' => [ 'shape' => 'ListId', ], 'ListName' => [ 'shape' => 'ResourceName', ], 'ListUpdateToken' => [ 'shape' => 'UpdateToken', ], 'CreateTime' => [ 'shape' => 'TimeStamp', ], 'LastUpdateTime' => [ 'shape' => 'TimeStamp', ], 'ProtocolsList' => [ 'shape' => 'ProtocolsList', ], 'PreviousProtocolsList' => [ 'shape' => 'PreviousProtocolsList', ], ], ], 'ProtocolsListDataSummary' => [ 'type' => 'structure', 'members' => [ 'ListArn' => [ 'shape' => 'ResourceArn', ], 'ListId' => [ 'shape' => 'ListId', ], 'ListName' => [ 'shape' => 'ResourceName', ], 'ProtocolsList' => [ 'shape' => 'ProtocolsList', ], ], ], 'ProtocolsListsData' => [ 'type' => 'list', 'member' => [ 'shape' => 'ProtocolsListDataSummary', ], ], 'PutAppsListRequest' => [ 'type' => 'structure', 'required' => [ 'AppsList', ], 'members' => [ 'AppsList' => [ 'shape' => 'AppsListData', ], 'TagList' => [ 'shape' => 'TagList', ], ], ], 'PutAppsListResponse' => [ 'type' => 'structure', 'members' => [ 'AppsList' => [ 'shape' => 'AppsListData', ], 'AppsListArn' => [ 'shape' => 'ResourceArn', ], ], ], 'PutNotificationChannelRequest' => [ 'type' => 'structure', 'required' => [ 'SnsTopicArn', 'SnsRoleName', ], 'members' => [ 'SnsTopicArn' => [ 'shape' => 'ResourceArn', ], 'SnsRoleName' => [ 'shape' => 'ResourceArn', ], ], ], 'PutPolicyRequest' => [ 'type' => 'structure', 'required' => [ 'Policy', ], 'members' => [ 'Policy' => [ 'shape' => 'Policy', ], 'TagList' => [ 'shape' => 'TagList', ], ], ], 'PutPolicyResponse' => [ 'type' => 'structure', 'members' => [ 'Policy' => [ 'shape' => 'Policy', ], 'PolicyArn' => [ 'shape' => 'ResourceArn', ], ], ], 'PutProtocolsListRequest' => [ 'type' => 'structure', 'required' => [ 'ProtocolsList', ], 'members' => [ 'ProtocolsList' => [ 'shape' => 'ProtocolsListData', ], 'TagList' => [ 'shape' => 'TagList', ], ], ], 'PutProtocolsListResponse' => [ 'type' => 'structure', 'members' => [ 'ProtocolsList' => [ 'shape' => 'ProtocolsListData', ], 'ProtocolsListArn' => [ 'shape' => 'ResourceArn', ], ], ], 'ReferenceRule' => [ 'type' => 'string', ], 'RemediationActionDescription' => [ 'type' => 'string', 'max' => 1024, 'min' => 0, 'pattern' => '.*', ], 'RemediationActionType' => [ 'type' => 'string', 'enum' => [ 'REMOVE', 'MODIFY', ], ], 'ResourceArn' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'ResourceCount' => [ 'type' => 'long', 'min' => 0, ], 'ResourceId' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'ResourceIdList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResourceId', ], ], 'ResourceName' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ResourceTag' => [ 'type' => 'structure', 'required' => [ 'Key', ], 'members' => [ 'Key' => [ 'shape' => 'ResourceTagKey', ], 'Value' => [ 'shape' => 'ResourceTagValue', ], ], ], 'ResourceTagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'ResourceTagValue' => [ 'type' => 'string', 'max' => 256, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'ResourceTags' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResourceTag', ], 'max' => 8, 'min' => 0, ], 'ResourceType' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'ResourceTypeList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResourceType', ], ], 'ResourceViolation' => [ 'type' => 'structure', 'members' => [ 'AwsVPCSecurityGroupViolation' => [ 'shape' => 'AwsVPCSecurityGroupViolation', ], 'AwsEc2NetworkInterfaceViolation' => [ 'shape' => 'AwsEc2NetworkInterfaceViolation', ], 'AwsEc2InstanceViolation' => [ 'shape' => 'AwsEc2InstanceViolation', ], ], ], 'ResourceViolations' => [ 'type' => 'list', 'member' => [ 'shape' => 'ResourceViolation', ], ], 'SecurityGroupRemediationAction' => [ 'type' => 'structure', 'members' => [ 'RemediationActionType' => [ 'shape' => 'RemediationActionType', ], 'Description' => [ 'shape' => 'RemediationActionDescription', ], 'RemediationResult' => [ 'shape' => 'SecurityGroupRuleDescription', ], 'IsDefaultAction' => [ 'shape' => 'Boolean', ], ], ], 'SecurityGroupRemediationActions' => [ 'type' => 'list', 'member' => [ 'shape' => 'SecurityGroupRemediationAction', ], ], 'SecurityGroupRuleDescription' => [ 'type' => 'structure', 'members' => [ 'IPV4Range' => [ 'shape' => 'CIDR', ], 'IPV6Range' => [ 'shape' => 'CIDR', ], 'PrefixListId' => [ 'shape' => 'ResourceId', ], 'Protocol' => [ 'shape' => 'LengthBoundedString', ], 'FromPort' => [ 'shape' => 'IPPortNumber', ], 'ToPort' => [ 'shape' => 'IPPortNumber', ], ], ], 'SecurityServicePolicyData' => [ 'type' => 'structure', 'required' => [ 'Type', ], 'members' => [ 'Type' => [ 'shape' => 'SecurityServiceType', ], 'ManagedServiceData' => [ 'shape' => 'ManagedServiceData', ], ], ], 'SecurityServiceType' => [ 'type' => 'string', 'enum' => [ 'WAF', 'WAFV2', 'SHIELD_ADVANCED', 'SECURITY_GROUPS_COMMON', 'SECURITY_GROUPS_CONTENT_AUDIT', 'SECURITY_GROUPS_USAGE_AUDIT', ], ], 'Tag' => [ 'type' => 'structure', 'required' => [ 'Key', 'Value', ], 'members' => [ 'Key' => [ 'shape' => 'TagKey', ], 'Value' => [ 'shape' => 'TagValue', ], ], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 200, 'min' => 0, ], 'TagList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], 'max' => 200, 'min' => 0, ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'TagList', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'ResourceArn', ], 'TagList' => [ 'shape' => 'TagList', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'TargetViolationReason' => [ 'type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '\\w+', ], 'TargetViolationReasons' => [ 'type' => 'list', 'member' => [ 'shape' => 'TargetViolationReason', ], ], 'TimeStamp' => [ 'type' => 'timestamp', ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'TagKeys', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'ResourceArn', ], 'TagKeys' => [ 'shape' => 'TagKeyList', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateToken' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '^([\\p{L}\\p{Z}\\p{N}_.:/=+\\-@]*)$', ], 'ViolationDetail' => [ 'type' => 'structure', 'required' => [ 'PolicyId', 'MemberAccount', 'ResourceId', 'ResourceType', 'ResourceViolations', ], 'members' => [ 'PolicyId' => [ 'shape' => 'PolicyId', ], 'MemberAccount' => [ 'shape' => 'AWSAccountId', ], 'ResourceId' => [ 'shape' => 'ResourceId', ], 'ResourceType' => [ 'shape' => 'ResourceType', ], 'ResourceViolations' => [ 'shape' => 'ResourceViolations', ], 'ResourceTags' => [ 'shape' => 'TagList', ], 'ResourceDescription' => [ 'shape' => 'LengthBoundedString', ], ], ], 'ViolationReason' => [ 'type' => 'string', 'enum' => [ 'WEB_ACL_MISSING_RULE_GROUP', 'RESOURCE_MISSING_WEB_ACL', 'RESOURCE_INCORRECT_WEB_ACL', 'RESOURCE_MISSING_SHIELD_PROTECTION', 'RESOURCE_MISSING_WEB_ACL_OR_SHIELD_PROTECTION', 'RESOURCE_MISSING_SECURITY_GROUP', 'RESOURCE_VIOLATES_AUDIT_SECURITY_GROUP', 'SECURITY_GROUP_UNUSED', 'SECURITY_GROUP_REDUNDANT', ], ], 'ViolationTarget' => [ 'type' => 'string', 'max' => 1024, 'min' => 0, 'pattern' => '.*', ], ],];
