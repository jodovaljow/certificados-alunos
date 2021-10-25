import { TestBed } from '@angular/core/testing';

import { DashboardCertificadosService } from './dashboard-certificados.service';

describe('DashboardCertificadosService', () => {
  let service: DashboardCertificadosService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DashboardCertificadosService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
