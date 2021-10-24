import { TestBed } from '@angular/core/testing';

import { EnviarCertificadoService } from './enviar-certificado.service';

describe('EnviarCertificadoService', () => {
  let service: EnviarCertificadoService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(EnviarCertificadoService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
