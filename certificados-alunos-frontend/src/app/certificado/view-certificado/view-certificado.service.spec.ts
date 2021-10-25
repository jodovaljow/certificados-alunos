import { TestBed } from '@angular/core/testing';

import { ViewCertificadoService } from './view-certificado.service';

describe('ViewCertificadoService', () => {
  let service: ViewCertificadoService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ViewCertificadoService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
